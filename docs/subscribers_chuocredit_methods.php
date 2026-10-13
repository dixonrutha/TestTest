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

        $this->data['subscribers'] = $this->Subscriber_model->get_chuocredit_subscribers();
        $this->load->view('_layout_main', $this->data);
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
