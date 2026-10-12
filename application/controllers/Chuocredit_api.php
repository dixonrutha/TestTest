<?php

use chriskacerguis\RestServer\RestController;

/**
 * Partner API for ChuoCredit student registrations.
 *
 *   POST /chuocredit_api/register   – register a student (fee already paid via ChuoCredit)
 *   GET  /chuocredit_api/campuses   – list supported campuses and their codes
 *   GET  /chuocredit_api/status?partner_reference=...  – look up a registration
 *
 * Auth: headers "auth-token" + "sender", checked against rest_api_keys (cert, username).
 */
class Chuocredit_api extends RestController
{
    const PARTNER = "chuocredit";
    const REGISTRATION_FEE = 5000;

    public function __construct()
    {
        parent::__construct();
        $this->load->model(["Ecoplus_registration_model"]);
    }

    public function register_post()
    {
        if (!$this->_is_authorized()) {
            return $this->response(["status" => "error", "message" => "Authorization Failed"], 401);
        }

        $full_name = trim((string)$this->post("full_name"));
        $gender_in = strtoupper(trim((string)$this->post("gender")));
        $mobile_in = trim((string)$this->post("mobile"));
        $email = trim((string)$this->post("email"));
        $campus_in = trim((string)$this->post("campus"));
        $referral_code = trim((string)$this->post("referral_code"));
        $partner_reference = trim((string)$this->post("partner_reference"));
        $payment_reference = trim((string)$this->post("payment_reference"));
        $amount = $this->post("amount");

        // -------------------------
        // 1. VALIDATE INPUT
        // -------------------------
        $errors = [];
        if ($full_name === "") {
            $errors["full_name"] = "Required";
        }
        if ($partner_reference === "") {
            $errors["partner_reference"] = "Required";
        }

        $gender_map = ["M" => "M", "MALE" => "M", "F" => "F", "FEMALE" => "F"];
        if (!isset($gender_map[$gender_in])) {
            $errors["gender"] = "Use M, F, Male or Female";
        }

        $mobile = $this->Ecoplus_registration_model->normalize_tz_mobile($mobile_in);
        if ($mobile === null) {
            $errors["mobile"] = "Use 07XXXXXXXX or 255XXXXXXXXX";
        }

        if ($email !== "" && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors["email"] = "Invalid email";
        }

        $campus_code = $this->Ecoplus_registration_model->get_campus_code($campus_in);
        if ($campus_code === "UNKNOWN") {
            $errors["campus"] = "Unknown campus. Use a campus_code from GET /chuocredit_api/campuses";
        }

        if (!is_numeric($amount) || (float)$amount < self::REGISTRATION_FEE) {
            $errors["amount"] = "Registration fee is TZS " . self::REGISTRATION_FEE;
        }

        if ($errors) {
            return $this->response([
                "status" => "error",
                "message" => "Validation failed",
                "errors" => $errors,
            ], 422);
        }

        // -------------------------
        // 2. IDEMPOTENCY – same partner_reference returns the original result
        // -------------------------
        $existing = $this->Ecoplus_registration_model->find_partner_registration(self::PARTNER, $partner_reference);
        if ($existing) {
            return $this->response([
                "status" => "success",
                "message" => "Already registered",
                "data" => $this->_registration_payload($existing->waba_reg_code, $partner_reference, $existing->mobile, $existing->campus_code),
            ], 200);
        }

        // -------------------------
        // 3. DUPLICATE MOBILE
        // -------------------------
        if ($this->Ecoplus_registration_model->mobile_exists($mobile)) {
            return $this->response([
                "status" => "error",
                "message" => "Mobile number is already registered",
            ], 409);
        }

        // -------------------------
        // 4. REGISTER (same path as WhatsApp ecoplus_pay_reg_post)
        // -------------------------
        $result = $this->Ecoplus_registration_model->register_paid([
            "fullname" => $full_name,
            "email" => $email,
            "mobile" => $mobile,
            "gender" => $gender_map[$gender_in],
            "campus_code" => $campus_code,
            "ambassador_phone" => $referral_code,
            "amount" => $amount,
            "channel" => self::PARTNER,
            "partner_reference" => $partner_reference,
            "payment_id" => $payment_reference,
            "payment_channel" => self::PARTNER,
        ]);

        if (!$result["status"]) {
            return $this->response(["status" => "error", "message" => $result["message"]], 500);
        }

        return $this->response([
            "status" => "success",
            "message" => "Registration completed successfully",
            "data" => $this->_registration_payload($result["registration_code"], $partner_reference, $mobile, $campus_code),
        ], 201);
    }

    public function status_get()
    {
        if (!$this->_is_authorized()) {
            return $this->response(["status" => "error", "message" => "Authorization Failed"], 401);
        }

        $partner_reference = trim((string)$this->get("partner_reference"));
        $reg = $partner_reference === ""
            ? null
            : $this->Ecoplus_registration_model->find_partner_registration(self::PARTNER, $partner_reference);

        if (!$reg) {
            return $this->response(["status" => "error", "message" => "Registration not found"], 404);
        }

        return $this->response([
            "status" => "success",
            "data" => $this->_registration_payload($reg->waba_reg_code, $partner_reference, $reg->mobile, $reg->campus_code)
                + ["record_stat" => $reg->record_stat, "registered_at" => $reg->sub_registration_date],
        ], 200);
    }

    public function campuses_get()
    {
        if (!$this->_is_authorized()) {
            return $this->response(["status" => "error", "message" => "Authorization Failed"], 401);
        }

        return $this->response([
            "status" => "success",
            "data" => $this->Ecoplus_registration_model->get_campuses(),
        ], 200);
    }

    private function _registration_payload($registration_code, $partner_reference, $mobile, $campus_code)
    {
        return [
            "registration_code" => $registration_code,
            "partner_reference" => $partner_reference,
            "mobile" => $mobile,
            "campus_code" => $campus_code,
        ];
    }

    // Only the ChuoCredit key may call this controller
    private function _is_authorized()
    {
        $token = $this->input->get_request_header("auth-token", true);
        $sender = $this->input->get_request_header("sender", true);

        if (empty($token) || $sender !== self::PARTNER) {
            return false;
        }

        return $this->db->where(["cert" => $token, "username" => $sender])
                ->count_all_results("rest_api_keys") === 1;
    }
}
