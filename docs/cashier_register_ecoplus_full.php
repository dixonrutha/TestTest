<?php
// Full replacements for the cashier controller:
// registerSubscriberByAmbassadorEcoPlus() and _initial_recharge()

    function registerSubscriberByAmbassadorEcoPlus()
    {
        if (empty($this->session->userdata('sub_add'))) {
            $this->session->set_flashdata('access_denied', 'Access denied, insufficient privileges.');
            redirect($_SERVER['HTTP_REFERER']);
        }
        $cashier = $this->Settings_model->get_cashier_details_by_id($this->session->userdata('id'));
        $system_param = $this->Settings_model->get_system_parameters();
        if ($cashier->card_balance <= 0) {
            $this->session->set_flashdata('error', 'You don\'t have card on your float to register new subscriber.<br/> Please contact support team.');
            redirect('dashboard/cashierDashboard');
        }
        $this->data['cashier'] = $cashier;
        // unset cashier data to session
        $this->session->unset_userdata('cashier_id');

        $this->session->unset_userdata('cashier_pos_id');
        $this->session->unset_userdata('cashier_pos_name');
        $this->session->unset_userdata('cashier_campus_id');
        $this->session->unset_userdata('cashier_campus_code');
        $this->session->unset_userdata('cashier_campus_name');
        $this->session->unset_userdata('cashier_card_balance');
        // set cashier data to session
        $this->session->set_userdata('cashier_id', $cashier->id);
        $this->session->set_userdata('cashier_pos_id', $cashier->pos_id);
        $this->session->set_userdata('cashier_pos_name', $cashier->pos_name);
        $this->session->set_userdata('cashier_campus_id', $cashier->campus_id);
        $this->session->set_userdata('cashier_campus_code', $cashier->campus_code);
        $this->session->set_userdata('cashier_campus_name', $cashier->campus_name);
        $this->session->set_userdata('cashier_card_balance', $cashier->card_balance);
        $cashier_details = $this->Dashboard_model->get_cashier_details($this->session->userdata('username'));

        $this->data['title'] = 'Subscriber';
        $this->data['subtitle'] = 'New Subscriber';
        $this->data["subview"] = "cashier/new_sub_ambassador";
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('sub_name', 'Full Name', 'trim|required');
            $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|numeric|exact_length[12]|greater_than_equal_to[255]');
            $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
            $this->form_validation->set_rules('category', 'Category', 'trim|required');
            $this->form_validation->set_rules('campus_code', 'Campus', 'trim|required');
            $this->form_validation->set_rules('card_no', 'Card No.', 'trim|required');
            $this->form_validation->set_rules('id_type', 'ID Number', 'trim|callback_validate_id_type');
            $this->form_validation->set_rules('record_stat', 'Subscriber Stat', 'trim|required');
            //$this->form_validation->set_rules('campus_sub_fee', 'Registration', 'trim|callback_validate_revenue');
            $this->form_validation->set_rules('email', 'Email', 'trim|valid_email');
            $topup_amount = $this->input->post('amount');
            $registered = $this->input->post('registered_by');

            $relationship_agent = $this->input->post('relationship_agent');
            $waba_reg_code_ecoplus = $this->input->post('waba_reg_code_ecoplus');
            $wa_reg_no = $this->input->post('wa_reg_no');

            // ChuoCredit students are identified by their ecoplus_paid_reg row (not the form)
            $is_chuocredit_reg = false;
            if (!empty($waba_reg_code_ecoplus)) {
                $paid_reg = $this->db->get_where('eco_ecoplus_paid_reg', array('waba_reg_code' => $waba_reg_code_ecoplus))->row();
                $is_chuocredit_reg = ($paid_reg && $paid_reg->registered_by === 'chuocredit');
            }

            $is_waba_reg = ($registered === 'waba_ecoplus') ? 'Y' : 'N';
            $is_ambasador_reg = ($registered === 'ambassador') ? 'Y' : 'N';
            $channel = 'validator';

            if ($is_chuocredit_reg) {
                $registered_by = 'chuocredit';
            } elseif ($is_waba_reg === 'Y') {
                $registered_by = 'waba_ecoplus';
            } elseif ($is_ambasador_reg === 'Y') {
                $registered_by = 'ambassador';
            } else {
                $registered_by = $this->session->userdata('username');
            }

            // Initial recharge: ChuoCredit TZS 11,000 (55L), everyone else TZS 1,000 (5L)
            $initial_amount = $is_chuocredit_reg ? 11000 : 1000;

            if (!empty($topup_amount)) {
                $this->form_validation->set_rules('amount', 'Initial Racharge', 'trim|callback_validate_recharge');
                $this->form_validation->set_rules('topup_category', 'Topup Category', 'trim|required');
                $this->form_validation->set_rules('topup_pos', 'Topup POS', 'trim|required');
            }
            $this->form_validation->set_rules('subscription_type', 'Subscription Type', 'trim|required');
            $subscription_type = $this->input->post('subscription_type');
            if ($subscription_type == 'Free') {
                $this->form_validation->set_rules('free_promo_code', 'Free Promo Code', 'trim|required');
            }

            $household_size = '';
            $street = '';
            $sub_cat = $this->input->post('category');
            if ($sub_cat === 'HOUSEHOLD') {
                $this->form_validation->set_rules('household_size', 'Household Size', 'trim|required');
                $household_size = $this->input->post('household_size');
                $this->form_validation->set_rules('street', 'Street', 'trim|required');
                $street = $this->input->post('street');
            } elseif ($sub_cat === 'RESIDENT') {
                $this->form_validation->set_rules('street', 'Street', 'trim|required');
                $street = $this->input->post('street');
            } elseif ($sub_cat === 'STUDENT') {
                $this->form_validation->set_rules('course', 'Course', 'required');
                $this->form_validation->set_rules('curr_course_year', 'Current year of Study', 'required');
                $this->form_validation->set_rules('total_course_years', 'Total Course Years', 'required');
            }
            if ($this->form_validation->run() == TRUE) {
                $sub_registration_date = date('Y-m-d H:i:s');
                //create card number
                $card_no = $this->input->post('card_no');
                $id_type = $this->input->post('id_type');
                $id_number = $this->input->post('id_number');
                $sub_account = date('ymdHi');
                $subfee = $this->Subscriber_model->get_campus_subscription_plan($this->input->post('campus_code'));
                if ($subfee) {
                    $fee = $subfee->fee_amount;
                } else {
                    $fee = 4000;
                }
                if ($subscription_type == 'Free') {
                    $subscription_plan = 'Free';
                    $sub_fee_amount = 0;
                    $free_promo_code = $this->input->post('free_promo_code');
                } elseif ($subscription_type == 'Fee') {
                    $subscription_plan = 'Fee';
                    $sub_fee_amount = $fee;
                    $free_promo_code = '';
                }
                $data = array(
                    'mobile' => $this->input->post('mobile'),
                    'mobile_2' => $this->input->post('mobile_2'),
                    'wa_reg_no' => $this->input->post('wa_reg_no'),
                    'sub_name' => strtoupper($this->input->post('sub_name')),
                    'gender' => $this->input->post('gender'),
                    'card_no' => $card_no,
                    'email' => strtolower($this->input->post('email')),
                    'record_stat' => $this->input->post('record_stat'),
                    'campus_code' => $this->input->post('campus_code'),
                    'category' => $this->input->post('category'),
                    'household_size' => $household_size,
                    'street' => $street,
                    'sub_account' => $sub_account,
                    'registered_by' => $registered_by,
                    'is_waba_reg' => $is_waba_reg,
                    'is_ambasador_reg' => $is_ambasador_reg,
                    'relationship_agent' => $this->session->userdata('username'),
                    'subscription_plan' => $subscription_plan,
                    'sub_fee_amount' => $sub_fee_amount,
                    'free_promo_code' => $free_promo_code,
                    'student_id' => $this->input->post('student_id'),
                    'course' => $this->input->post('course'),
                    'curr_course_year' => $this->input->post('curr_course_year'),
                    'total_course_years' => $this->input->post('total_course_years'),
                    'sub_registration_date' => $sub_registration_date,
                    'id_type' => $id_type,
                    'id_number' => preg_replace('/[^a-zA-Z0-9]+/', '', $id_number),
                    'franchisee_id' => $cashier_details->franchisee_id
                );
                $this->db->trans_start();
                $insert_id = $this->Subscriber_model->insert_new_subscriber($data);
                $sub_id = $insert_id;
                $enc_id = array('enc_id' => MD5(MD5($insert_id)));
                $this->Subscriber_model->update_subscriber($enc_id, $insert_id);
                $update_data = array('occupied' => 'Y');
                $this->Subscriber_model->update_card($update_data, $card_no);

                // Registration code is used once – clear it so it cannot be collected again
                if (!empty($waba_reg_code_ecoplus)) {
                    $this->db->where('waba_reg_code', $waba_reg_code_ecoplus);
                    $this->db->update('eco_ecoplus_paid_reg', array(
                        'waba_reg_code' => NULL,
                    ));
                }

                //update card balance
                $card_data = array(
                    'card_balance' => $cashier->card_balance - 1,
                    'card_new_sold' => $cashier->card_new_sold + 1
                );
                $this->db->where('id', $cashier->id);
                $this->db->update('cashiers', $card_data);

                //update float balance: subtract 5000 directly from the current value
                $this->db->set('current_float', 'current_float - 5000', FALSE);
                $this->db->where('id', $this->input->post('cashier_id'));
                $this->db->where('franchisee_id IS NOT NULL');
                $this->db->where('franchisee_id !=', '');
                $this->db->update('cashiers');

                // Initial recharge (11,000 for ChuoCredit, 1,000 otherwise)
                $topup_amount = $this->_initial_recharge($card_no, $sub_id, $initial_amount);

                //send sms if cashier enabled for SMS sent
                if ($cashier->send_sms == 'Y') {
                    $msisdn = $this->input->post('mobile');
                    $litres = $initial_amount / 200; // 1L = TZS 200
                    $message = 'Ecowater account successfully created on ' . date('d/m/y H:i') . ' Cost: Tsh 5,000 and initial ' . $litres . 'L offer. Tap validator to validate. Customer Care ' . $system_param->customer_care_1 . '/' . $system_param->customer_care_2;
                    $sms_out = array('receiver' => $msisdn, 'message' => $message, 'maker_id' => 'SYSTEM');
                    $this->db->insert('sms_outgoing', $sms_out);
                    $this->Sms_model->sendsms($message, $msisdn);
                }
                $this->db->trans_complete();

                $confirm_data = $this->db->get_where('sub_card_vw', array('card_no' => $card_no))->row();
                $this->session->set_flashdata('success', 'Subscriber registered, Name: ' . $confirm_data->sub_name . ' Card No.: ' . $confirm_data->card_no);
                $id = $this->session->userdata('id');
                redirect('dashboard/cashierDashboard/' . $id);
            }
            $this->data['cashier'] = $this->Settings_model->get_cashier_details_by_id($this->session->userdata('id'));
        }
        $this->data['sub_cat'] = $this->db->query("select * from eco_sub_category where category in ('STUDENT', 'STAFF', 'NON_RESIDENT', 'HOUSEHOLD', 'CORPORATE')")->result();
        $this->data['streets'] = $this->Subscriber_model->get_all_streets();
        $this->data['topup_cat'] = $this->Card_model->get_all_topup_categories();
        $this->data['courses'] = $this->Subscriber_model->get_student_courses();
        $this->data['id_types'] = $this->db->get_where('id_types', array('id <>' => '6'))->result();
        $this->data['system_param'] = $system_param;
        $this->load->view('_layout_cashier', $this->data);
    }

    function _initial_recharge($card_no, $sub_id, $amount = 1000)
    {
        $sub_data = $this->db->get_where('sub_card_vw', array('sub_id' => $sub_id))->row();

        $maker_id = $this->session->userdata('username');
        $pos = 'VAL';
        $channel = 'USER';
        if ($sub_data->campus_stores_system == 'Digital') {
            $dr_cr_flag = 'C';
            $narration = 'Initial Recharge';
            $this->_insert_wallet_trans($sub_id, $card_no, $amount, $dr_cr_flag, $narration, $maker_id, $channel);
            $this->db->query("update eco_subscribers set majik_wallet_bal = ifnull(majik_wallet_bal,0) + ? where id = ?", array($amount, $sub_id));
        } else {
            $data_recharge = array(
                'card_no' => $card_no,
                'sub_id' => $sub_id,
                'amount' => $amount,
                'trn_date' => date('Y-m-d'),
                'pos' => $pos,
                'trn_status' => 'SUCCESS',
                'category' => 'RECHARGE',
                'maker_id' => $maker_id
            );
            $topup_id = $this->Card_model->insert_pos_topup($data_recharge);
            //generate ecowater transaction reference
            $eco_ref = $this->_generate_eco_ref($topup_id, 'OTHERS');
            $trn_ref_no = $pos . $eco_ref;
            $topup_update_data = array('trn_ref_no' => $trn_ref_no);
            $this->Card_model->update_pos_topup($topup_update_data, $topup_id);
            //insert data for validation
            $payment_data = array(
                'eco_ref' => $trn_ref_no,
                'operator' => 'ECOWATER',
                'utilityref_card_no' => $sub_data->card_luhn,
                'amount' => $amount,
                'og_tran_amt' => $amount,
                'timestamp_selcom' => date('Y-m-d H:i:s'),
                'v_status' => '000',
                'n_status' => '000',
                'sub_id' => $sub_id,
                'comment' => 'Initial Recharge',
                'maker_id' => $maker_id,
                'channel_id' => 'USER',
                'reference_selcom' => 'NIL',
                'transid_operator' => 'NIL',
                'msisdn' => 'NIL',
                'cust_card_no' => $sub_data->card_no
            );
            $this->db->insert('selcom_payments', $payment_data);
            $data = array('date_last_topup' => date('Y-m-d H:i:s'));
            $this->Subscriber_model->update_subscriber($data, $sub_id);
        }
        return $amount; //for updating float
    }
