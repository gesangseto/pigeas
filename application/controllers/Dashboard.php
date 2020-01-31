<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('id'))) {
            redirect(site_url("404"));
        }
        $this->load->model('_BaseRole');
        $header['data'] = $this->_BaseRole->_check_permission();
        $this->load->view('Templates/Header', $header);
        $this->load->model('_Dashboard');
    }


    public function index()
    {
        $data['count_all_notread_cust_message'] = $this->_Dashboard->_count_all_notread_cust_message();
        $data['count_all_cust_message'] = $this->_Dashboard->_count_all_cust_message();

        $this->load->view('Dashboard/Index', $data);
        $this->load->view('Templates/Footer');
    }
}

/* End of Index Controllername.php */
