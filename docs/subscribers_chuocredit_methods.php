<?php
/*
 * ChuoCredit subscribers page.
 *
 * 1. Controller: paste chuocreditSubscribers() into your Subscribers controller.
 * 2. Model: paste get_chuocredit_subscribers() into Subscriber_model.
 * 3. View: application/views/subscribers/chuocredit_subscribers.php
 * 4. Menu link: base_url('12bea52c7aed0fd541eff5b4308b4db9')
 *    (md5 of 'subscribers/chuocreditSubscribers', same pattern as allSubscribers)
 */

// ---------------- Subscribers controller ----------------

    function chuocreditSubscribers()
    {
        if (empty($this->session->userdata('sub_view'))) {
            $this->session->set_flashdata('access_denied', 'Access denied, insufficient privileges.');
            redirect($_SERVER['HTTP_REFERER']);
        }
        $this->data['title'] = 'Subscribers';
        $this->data['subtitle'] = 'ChuoCredit Subscribers';
        $this->data["subview"] = 'subscribers/chuocredit_subscribers';
        $this->data['pageurl'] = '12bea52c7aed0fd541eff5b4308b4db9'; // subscribers/chuocreditSubscribers

        $subscribers = $this->Subscriber_model->get_chuocredit_subscribers();
        $this->data['subscribers'] = $subscribers;
        $this->data['stats'] = $this->_chuocredit_stats($subscribers);
        $this->load->view('_layout_main', $this->data);
    }

    // Dashboard figures for the ChuoCredit subscribers page
    private function _chuocredit_stats($subscribers)
    {
        $stats = [
            'total' => count($subscribers),
            'today' => 0,
            'month' => 0,
            'fees' => 0,
            'female' => 0,
            'male' => 0,
            'female_pct' => 0,
            'male_pct' => 0,
            'campuses' => [],
        ];

        $today = date('Y-m-d');
        $month = date('Y-m');

        foreach ($subscribers as $s) {
            $reg_day = date('Y-m-d', strtotime($s->sub_registration_date));
            if ($reg_day === $today) {
                $stats['today']++;
            }
            if (substr($reg_day, 0, 7) === $month) {
                $stats['month']++;
            }
            $stats['fees'] += (float)$s->sub_fee_amount;

            if ($s->gender === 'F') {
                $stats['female']++;
            } else {
                $stats['male']++;
            }

            $campus = !empty($s->campus_name) ? $s->campus_name : $s->campus_code;
            $stats['campuses'][$campus] = ($stats['campuses'][$campus] ?? 0) + 1;
        }

        if ($stats['total'] > 0) {
            $stats['female_pct'] = round($stats['female'] * 100 / $stats['total']);
            $stats['male_pct'] = 100 - $stats['female_pct'];
        }
        arsort($stats['campuses']);

        return $stats;
    }

// ---------------- Subscriber_model ----------------

    // Students registered through the ChuoCredit API (ecoplus_paid_reg)
    function get_chuocredit_subscribers()
    {
        $this->db->select('r.*, c.campus_name');
        $this->db->from('ecoplus_paid_reg r');
        $this->db->join('campus c', 'c.campus_code = r.campus_code', 'left');
        $this->db->where('r.registered_by', 'chuocredit');
        $this->db->order_by('r.id', 'DESC');
        return $this->db->get()->result();
    }
