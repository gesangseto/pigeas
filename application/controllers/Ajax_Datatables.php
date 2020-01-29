<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ajax_Datatables extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('id'))) {
            redirect(site_url("404"));
        }
        $this->load->model('_Ajax_Datatables');
    }
    function get_data_user_admin()
    {
        $BaseData = array(
            'table' => 'user_admin',
            'column_order' => array(null, 'username', 'email', 'password'),
            'column_search' => array('username', 'email', 'password'),
            'order' => array('id' => 'asc')
        );
        $list = $this->_Ajax_Datatables->get_datatables($BaseData);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->username;
            $row[] = $field->email;
            $row[] = $field->create_time;
            $row[] = $field->update_time;
            $row[] = '
        <button onclick="hapus(' . $field->id . ')" class="btn btn-danger"><i class="fa fa-trash"></i></button>
            <a href="' . site_url('User_Admin/Update') . '?id=' . $field->id . '" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
            <a href="' . site_url('User_Admin/Read') . '?id=' . $field->id . '" class="btn btn-success"><i class="fa fa-search"></i></a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->_Ajax_Datatables->count_all($BaseData),
            "recordsFiltered" => $this->_Ajax_Datatables->count_filtered($BaseData),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
}

/* End of file Login.php */
