<?php
/*
 * ChuoCredit partner methods for Waba_api.
 *
 * Paste everything between START and END inside the Waba_api class
 * (e.g. just above the "Selcom USSD Push Code Start Here" comment).
 * Nothing existing is replaced; ecoplus_pay_reg_post() stays as it is.
 * It reuses the existing _generate_luhn_check() and the Sms_model
 * already loaded in the Waba_api constructor.
 */

    // ===================== START: ChuoCredit partner API =====================

    // rest_api_keys.username allowed to call the ChuoCredit endpoints.
    // Temporarily "efa" for testing; change to "chuocredit" once its key is added.
    private $chuocredit_sender = "efa";

    // Campus name => campus code (same codes as get_campus_code)
    private $chuocredit_campus_codes = [
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

    // POST student_register
    public function chuocredit_register_post()
    {
        if (!$this->_chuocredit_authorized()) {
            return $this->response(["status" => "error", "message" => "Authorization Failed"], 401);
        }

        $full_name = trim((string)$this->post("full_name"));
        $gender_in = strtoupper(trim((string)$this->post("gender")));
        $mobile_in = trim((string)$this->post("mobile"));
        $email = trim((string)$this->post("email"));
        $campus_in = trim((string)$this->post("campus"));
        $amount = $this->post("amount");

        // -------------------------
        // 1. VALIDATE INPUT
        // -------------------------
        $errors = [];
        if ($full_name === "") {
            $errors["full_name"] = "Required";
        }

        $gender_map = ["M" => "M", "MALE" => "M", "F" => "F", "FEMALE" => "F"];
        if (!isset($gender_map[$gender_in])) {
            $errors["gender"] = "Use M, F, Male or Female";
        }

        $mobile = $this->_chuocredit_mobile($mobile_in);
        if ($mobile === null) {
            $errors["mobile"] = "Use 07XXXXXXXX or 255XXXXXXXXX";
        }

        if ($email !== "" && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors["email"] = "Invalid email";
        }

        $campus_code = $this->_chuocredit_campus_code($campus_in);
        if ($campus_code === null) {
            $errors["campus"] = "Unknown campus. Use a campus_code from GET campus_list";
        }

        if (!is_numeric($amount) || (float)$amount < 5000) {
            $errors["amount"] = "Registration fee is TZS 5000";
        }

        if ($errors) {
            return $this->response([
                "status" => "error",
                "message" => "Validation failed",
                "errors" => $errors,
            ], 422);
        }

        // -------------------------
        // 2. DUPLICATE MOBILE (existing account or uncollected registration)
        // -------------------------
        $in_subscribers = $this->db->where("mobile", $mobile)->count_all_results("subscribers") > 0;
        $in_paid_reg = $this->db->where("mobile", $mobile)->count_all_results("ecoplus_paid_reg") > 0;
        if ($in_subscribers || $in_paid_reg) {
            return $this->response([
                "status" => "error",
                "message" => "Mobile number is already registered",
            ], 409);
        }

        // -------------------------
        // 3. INSERT INTO ecoplus_paid_reg
        // -------------------------
        $this->db->trans_start();

        $this->db->insert("ecoplus_paid_reg", [
            "sub_name" => $full_name,
            "email" => $email,
            "mobile" => $mobile,
            "gender" => $gender_map[$gender_in],
            "campus_code" => $campus_code,
            "sub_registration_date" => date("Y-m-d H:i:s"),
            "relationship_agent" => "chuocredit",
            "subscription_plan" => "Fee",
            "record_stat" => "OPEN",
            "category" => "STUDENT",
            "sub_fee_amount" => $amount,
            "registered_by" => "chuocredit",
        ]);
        $subscriber_id = $this->db->insert_id();

        // No WhatsApp convo id here, so the collection code is built from the
        // ecoplus_paid_reg id with prefix 541 (WhatsApp codes use 539).
        $reg_code = "541" . str_pad($subscriber_id, 6, "0", STR_PAD_LEFT)
            . $this->_generate_luhn_check($subscriber_id);

        $this->db->where("id", $subscriber_id);
        $this->db->update("ecoplus_paid_reg", [
            "enc_id" => md5(md5($subscriber_id)),
            "waba_reg_code" => $reg_code,
        ]);

        $this->db->trans_complete();

        if ($this->db->trans_status() === false) {
            return $this->response(["status" => "error", "message" => "Registration could not be saved"], 500);
        }

        // -------------------------
        // 4. SEND SMS
        // -------------------------
        $message = "Congratulations! Your registration is complete. Use your ID and code $reg_code to collect your card at any of our stores.";
        $this->db->insert("sms_outgoing", [
            "receiver" => $mobile,
            "message" => $message,
            "maker_id" => "SYSTEM",
        ]);
        $this->Sms_model->sendsms($message, $mobile);

        return $this->response([
            "status" => "success",
            "message" => "Registration completed successfully",
            "data" => [
                "registration_code" => $reg_code,
                "mobile" => $mobile,
                "campus_code" => $campus_code,
            ],
        ], 201);
    }

    // GET student_status?registration_code=...
    public function chuocredit_status_get()
    {
        if (!$this->_chuocredit_authorized()) {
            return $this->response(["status" => "error", "message" => "Authorization Failed"], 401);
        }

        $registration_code = trim((string)$this->get("registration_code"));
        $reg = $registration_code === "" ? null : $this->db->get_where("ecoplus_paid_reg", [
            "waba_reg_code" => $registration_code,
            "registered_by" => "chuocredit",
        ])->row();

        if (!$reg) {
            return $this->response(["status" => "error", "message" => "Registration not found"], 404);
        }

        return $this->response([
            "status" => "success",
            "data" => [
                "registration_code" => $reg->waba_reg_code,
                "mobile" => $reg->mobile,
                "campus_code" => $reg->campus_code,
                "record_stat" => $reg->record_stat,
                "registered_at" => $reg->sub_registration_date,
            ],
        ], 200);
    }

    // GET campus_list
    public function chuocredit_campuses_get()
    {
        if (!$this->_chuocredit_authorized()) {
            return $this->response(["status" => "error", "message" => "Authorization Failed"], 401);
        }

        $list = [];
        foreach ($this->chuocredit_campus_codes as $name => $code) {
            $list[] = ["campus_code" => $code, "campus_name" => $name];
        }

        return $this->response(["status" => "success", "data" => $list], 200);
    }

    // Accepts a campus code (CA-000060) or the campus name; returns the code or null
    private function _chuocredit_campus_code($campus)
    {
        if ($campus === "") {
            return null;
        }

        $upper = strtoupper($campus);
        if (in_array($upper, $this->chuocredit_campus_codes, true)) {
            return $upper;
        }

        $name = ucwords(strtolower(str_replace('_', ' ', $campus)));
        return $this->chuocredit_campus_codes[$name] ?? null;
    }

    // 07XXXXXXXX / 7XXXXXXXX / +255XXXXXXXXX / 255XXXXXXXXX => 255XXXXXXXXX, otherwise null
    private function _chuocredit_mobile($number)
    {
        $digits = preg_replace("/[^0-9]/", "", $number);
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

    // Only the key whose username is $chuocredit_sender may call these
    private function _chuocredit_authorized()
    {
        $token = $this->input->get_request_header("auth-token", true);
        $sender = $this->input->get_request_header("sender", true);

        if (empty($token) || $sender !== $this->chuocredit_sender) {
            return false;
        }

        return $this->db->where(["cert" => $token, "username" => $sender])
                ->count_all_results("rest_api_keys") === 1;
    }

    // ====================== END: ChuoCredit partner API ======================
