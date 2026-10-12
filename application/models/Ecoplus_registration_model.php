<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * ecoPlus paid registration for partner channels (ChuoCredit).
 *
 * Mirrors Waba_api::ecoplus_pay_reg_post(), which stays untouched for
 * WhatsApp customers: same row in ecoplus_paid_reg, same "collect your card"
 * SMS and same referral bonus, but the student data comes from the partner
 * request instead of waba_ecoplus_convo.
 */
class Ecoplus_registration_model extends CI_Model
{
    // Campus name => campus code
    private $campus_codes = [
        'Sokoine University Of Agriculture' => 'CA-000060',
        'St. John University Of Tanzania' => 'CA-000057',
        'College Of Business Education (Dodoma)' => 'CA-000061',
        'College Of Business Education (Mwanza)' => 'CA-000036',
        'Institute Of Rural Development Planning' => 'CA-000068',
        'University Of Iringa' => 'CA-000058',
        'Ruaha Catholic University' => 'CA-000066',
        'Mbeya University Of Science And Technology' => 'CA-000007',
        'Arusha Technical College' => 'CA-000062',
        'Catholic University Of Health And Allied Sciences' => 'CA-000065',
        'St. Augustine University Of Tanzania' => 'CA-000001',
        'University Of Dodoma' => 'CA-000059',
        'Mzumbe University' => 'CA-000069',
    ];

    // Short names / common spellings => official campus name
    private $campus_aliases = [
        'Sua' => 'Sokoine University Of Agriculture',
        'St John University Of Tanzania' => 'St. John University Of Tanzania',
        'Sjuit' => 'St. John University Of Tanzania',
        'Udom' => 'University Of Dodoma',
        'Dodoma University' => 'University Of Dodoma',
        'Mzumbe' => 'Mzumbe University',
        'Ruaha Catholic' => 'Ruaha Catholic University',
        'Iringa University' => 'University Of Iringa',
        'Cbe Dodoma' => 'College Of Business Education (Dodoma)',
        'Cbe Mwanza' => 'College Of Business Education (Mwanza)',
        'Mwenge Catholic University' => 'St. Augustine University Of Tanzania',
    ];

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sms_model');
    }

    /**
     * Register a student whose registration fee has already been paid.
     *
     * $reg keys:
     *   fullname, email, mobile, gender (M/F), campus_code, ambassador_phone (referral code),
     *   amount, waba_reg_code (optional – generated when empty),
     *   channel ('waba_ecoplus' | 'chuocredit'), partner_reference (optional),
     *   payment_id, payment_channel (optional)
     *
     * Returns ['status' => true, 'id' => .., 'registration_code' => ..] or
     *         ['status' => false, 'message' => ..]
     */
    public function register_paid(array $reg)
    {
        $mobile = $this->format_mobile($reg['mobile']);
        $channel = $reg['channel'];

        $this->db->trans_start();

        $sub_data = [
            "sub_name" => $reg['fullname'],
            "email" => $reg['email'],
            "mobile" => $mobile,
            "ambassador_phone" => $reg['ambassador_phone'],
            "gender" => $reg['gender'],
            "campus_code" => $reg['campus_code'],
            "waba_reg_code" => $reg['waba_reg_code'] ?? null,
            "sub_registration_date" => date("Y-m-d H:i:s"),
            "relationship_agent" => $channel,
            "subscription_plan" => "Fee",
            "record_stat" => "OPEN",
            "category" => "STUDENT",
            "sub_fee_amount" => $reg['amount'],
            "registered_by" => $channel,
        ];
        if (!empty($reg['partner_reference'])) {
            $sub_data["partner_reference"] = $reg['partner_reference'];
            $sub_data["payment_reference"] = $reg['payment_id'] ?? null;
            $sub_data["payment_channel"] = $reg['payment_channel'] ?? null;
        }

        $this->db->insert("ecoplus_paid_reg", $sub_data);
        $subscriber_id = $this->db->insert_id();

        // Partner registrations have no WhatsApp convo id, so the collection
        // code is built from the ecoplus_paid_reg id with its own prefix
        // (541) to never clash with WhatsApp codes (539 + convo id).
        $reg_code = $reg['waba_reg_code'] ?? '';
        if ($reg_code === '' || $reg_code === null) {
            $reg_code = "541" . str_pad($subscriber_id, 6, "0", STR_PAD_LEFT)
                . $this->generate_luhn_check($subscriber_id);
        }

        $this->db->where("id", $subscriber_id);
        $this->db->update("ecoplus_paid_reg", [
            "enc_id" => md5(md5($subscriber_id)),
            "waba_reg_code" => $reg_code,
        ]);

        $this->db->trans_complete();

        if ($this->db->trans_status() === false) {
            return ["status" => false, "message" => "Registration could not be saved"];
        }

        // Side effects only after the registration is committed
        $message = "Congratulations! Your registration is complete. Use your ID and code $reg_code to collect your card at any of our stores.";
        $this->db->insert("sms_outgoing", [
            "receiver" => $mobile,
            "message" => $message,
            "maker_id" => "SYSTEM",
        ]);
        $this->Sms_model->sendsms($message, $mobile);

        if (!empty($reg['ambassador_phone'])) {
            $this->recharge_ambassador_card($reg['ambassador_phone']);
        }

        return [
            "status" => true,
            "id" => $subscriber_id,
            "registration_code" => $reg_code,
        ];
    }

    /** Finds an existing registration by partner + partner reference (idempotency). */
    public function find_partner_registration($channel, $partner_reference)
    {
        return $this->db->get_where("ecoplus_paid_reg", [
            "registered_by" => $channel,
            "partner_reference" => $partner_reference,
        ])->row();
    }

    /** True when the mobile already has an account or a pending (uncollected) registration. */
    public function mobile_exists($mobile)
    {
        $mobile = $this->format_mobile($mobile);
        if ($this->db->where("mobile", $mobile)->count_all_results("subscribers") > 0) {
            return true;
        }
        return $this->db->where("mobile", $mobile)->count_all_results("ecoplus_paid_reg") > 0;
    }

    /** Accepts a campus code (CA-000060) or a campus name/alias; returns the code or 'UNKNOWN'. */
    public function get_campus_code($campus)
    {
        if (empty($campus)) {
            return 'UNKNOWN';
        }

        $upper = strtoupper(trim($campus));
        if (in_array($upper, $this->campus_codes, true)) {
            return $upper;
        }

        $clean = preg_replace('/^\d+_/', '', $campus);   // Removes "1_" (WhatsApp flow prefix)
        $clean = str_replace('_', ' ', $clean);
        $clean = ucwords(strtolower(trim($clean)));
        $clean = $this->campus_aliases[$clean] ?? $clean;

        return $this->campus_codes[$clean] ?? 'UNKNOWN';
    }

    public function get_campuses()
    {
        $list = [];
        foreach ($this->campus_codes as $name => $code) {
            $list[] = ["campus_code" => $code, "campus_name" => $name];
        }
        return $list;
    }

    /** 07XXXXXXXX / 7XXXXXXXX / +255XXXXXXXXX / 255XXXXXXXXX => 255XXXXXXXXX, otherwise null. */
    public function normalize_tz_mobile($number)
    {
        $digits = preg_replace("/[^0-9]/", "", (string)$number);
        if (strlen($digits) === 10 && $digits[0] === "0") {
            return "255" . substr($digits, 1);
        }
        if (strlen($digits) === 9 && ($digits[0] === "6" || $digits[0] === "7")) {
            return "255" . $digits;
        }
        if (strlen($digits) === 12 && substr($digits, 0, 3) === "255") {
            return $digits;
        }
        return null;
    }

    public function format_mobile($number)
    {
        $number = trim($number);
        if (strpos($number, "0") === 0) {
            return "255" . substr($number, 1);
        }
        return $number;
    }

    /** Gives the referrer 2L (TZS 400) when the referral code matches a card. */
    public function recharge_ambassador_card($referral_card_no)
    {
        $sub = $this->db->query(
            "select a.* from eco_sub_card_vw a where a.card_no = ? or a.card_luhn = ?",
            [$referral_card_no, $referral_card_no]
        );
        if ($sub->num_rows() < 1) {
            return;
        }

        $sub_details = $sub->row();
        $narration = 'ecoPlus bonus for new registration';
        $amount = 200 * 2; // 1L is 200Tsh

        if ($sub_details->campus_stores_system == 'Digital') {
            $this->insert_wallet_trans($sub_details->sub_id, $sub_details->card_luhn, $amount, 'C', $narration, 'SYSTEM', 'SYSTEM');
            $this->db->query(
                "update eco_subscribers set majik_wallet_bal = ifnull(majik_wallet_bal,0) + ? where id = ?",
                [$amount, $sub_details->sub_id]
            );
        } else {
            $payment_data = [
                'operator' => 'ECOWATER',
                'utilityref_card_no' => $sub_details->card_luhn,
                'amount' => $amount,
                'og_tran_amt' => $amount,
                'timestamp_selcom' => date('Y-m-d H:i:s'),
                'v_status' => '000',
                'n_status' => '000',
                'sub_id' => $sub_details->sub_id,
                'comment' => $narration,
                'maker_id' => 'SYSTEM',
                'channel_id' => 'VAL',
                'reference_selcom' => 'NIL',
                'transid_operator' => 'NIL',
                'msisdn' => 'NIL',
                'cust_card_no' => $sub_details->card_no,
            ];
            $this->db->insert('selcom_payments', $payment_data);
            $payment_id = $this->db->insert_id();
            $eco_ref = 'EC' . $payment_id . $this->generate_luhn_check($payment_id);
            $this->db->where('id', $payment_id);
            $this->db->update('selcom_payments', ['eco_ref' => $eco_ref]);
            $this->db->insert('card_topup', [
                'card_no' => $sub_details->card_luhn,
                'sub_id' => $sub_details->sub_id,
                'trn_ref_no' => $eco_ref,
                'amount' => $amount,
                'trn_date' => date('Y-m-d'),
                'pos' => 'VAL',
                'category' => 'SPECIAL_OFFER',
                'maker_id' => 'SYSTEM',
            ]);
        }

        $message = 'Hongera, umezawadiwa 2L ya maji ' . date('d/m/Y H:i') . ', kadi yako ' . $referral_card_no . ' imetumika kama referral code kwa usajili mpya kupitia ecoplus.';
        $this->Sms_model->sendsms($message, $sub_details->sub_mobile);
        $this->Sms_model->insertOutgoingSMS([
            'receiver' => $sub_details->sub_mobile,
            'message' => $message,
            'maker_id' => 'SYSTEM',
        ]);
    }

    public function insert_wallet_trans($sub_id, $card_no, $amount, $dr_cr_flag, $narration, $maker_id, $channel)
    {
        $sub_data = $this->db->get_where('sub_card_vw', ['sub_id' => $sub_id])->row();
        if ($dr_cr_flag == 'D') {
            $wallet_bal = $sub_data->majik_wallet_bal - $amount;
        } elseif ($dr_cr_flag == 'C') {
            $wallet_bal = $sub_data->majik_wallet_bal + $amount;
        } else {
            $wallet_bal = null;
        }
        $this->db->insert('wallet_trans', [
            'sub_id' => $sub_id,
            'card_no' => $card_no,
            'trn_date' => date('Y-m-d H:i:s'),
            'amount' => $amount,
            'dr_cr_flag' => $dr_cr_flag,
            'narration' => $narration,
            'maker_id' => $maker_id,
            'channel' => $channel,
            'wallet_bal' => $wallet_bal,
            'wallet_open_bal' => $sub_data->majik_wallet_bal,
            'wallet_close_bal' => $wallet_bal,
        ]);
        return $this->db->insert_id();
    }

    public function generate_luhn_check($value = "")
    {
        $value = (string)$value;
        $length = strlen($value);
        $parity = $length % 2;
        $sum = 0;
        for ($i = $length - 1; $i >= 0; --$i) {
            $char = $value[$i];
            if ($i % 2 != $parity) {
                $char *= 2;
                if ($char > 9) {
                    $char -= 9;
                }
            }
            $sum += $char;
        }
        return ($sum * 9) % 10;
    }
}
