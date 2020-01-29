<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('id'))) {
            redirect(site_url("404"));
        }
        $this->_check_permission();
        $this->load->model('_User_Admin');
    }


    public function index()
    {
        $data['user'] = $this->_User_Admin->_view_all_user();
        $this->load->view('User_Admin/Index', $data);
        $this->load->view('Templates/Footer');
    }
    public function create()
    {
        $datetime = strtotime(date('Y-m-d H:i:s'));
        if (empty($this->input->post('email'))) {
            $this->load->view('User_Admin/Create');
        } else {
            $email = $this->input->post('email', TRUE);
            $username = $this->input->post('username', TRUE);
            $query = $this->db->query("SELECT * FROM `user_admin` WHERE `email` = '$email' OR `username`='$username'");
            if ($query->num_rows() >= 1) {
                $data = array(
                    "status" => "0",
                    "message" => "Email or username already exist"
                );
                $this->load->view('User_Admin/Create', $data);
            } // Check Password 
            else if ($this->input->post('password') != $this->input->post('re_password')) {
                $data = array(
                    "status" => "0",
                    "message" => "Password did not match"
                );
                $this->load->view('User_Admin/Create', $data);
            } else {
                $data = array(
                    "id" => $datetime,
                    "email" => $this->input->post('email', TRUE),
                    "password" => $this->hash($this->input->post('password')),
                    "username" => $this->input->post('username', TRUE)
                );
                $this->db->insert('user_admin', $data);
                $data = array(
                    "status" => 1,
                    "message" => "Success Add User"
                );
                $data['user'] = $this->_User_Admin->_view_all_user();
                $this->load->view('User_Admin/Index', $data);
            }
        }
        $this->load->view('Templates/Footer');
    }
    public function read()
    {
        if (!empty($this->input->get('id'))) {
            $id = $this->input->get('id', TRUE);
            $data['user_info'] = $this->_User_Admin->_view_user($id);
            $this->load->view('User_Admin/Read', $data);
        }
        $this->load->view('Templates/Footer');
    }
    public function update()
    {
        if (!empty($this->input->get('id'))) {
            $id = $this->input->get('id', TRUE);
            $data['user_info'] = $this->_User_Admin->_view_user($id);
            $this->load->view('User_Admin/Update', $data);
            $this->load->view('Templates/Footer');
        } else if (!empty($this->input->post('id'))) {
            $id = $this->input->post('id');
            if (!empty($this->input->post('password') && $this->input->post('re_password'))) {
                if ($this->input->post('password') != $this->input->post('re_password')) {
                    $data = array(
                        "status" => 0,
                        "message" => "Password did not match",
                        'id' => $this->input->post('id'),
                        'username' => $this->input->post('username'),
                        'email' => $this->input->post('email'),
                    );
                    $dataRs = $data;
                    $dataRs['user_info'] = array($data);
                    $this->load->view('User_Admin/Update', $dataRs);
                } else {
                    $data = array(
                        'id' => $this->input->post('id'),
                        'username' => $this->input->post('username'),
                        'email' => $this->input->post('email'),
                        "password" => $this->hash($this->input->post('password'))
                    );
                    $check = $this->_User_Admin->_check_update($id, $data);
                    if ($check['status'] == 1) {
                        $data = $this->_User_Admin->_update_user($id, $data);
                        $data['user'] = $this->_User_Admin->_view_all_user();
                        $this->load->view('User_Admin/Index', $data);
                    } else {
                        $dataRs = $check;
                        $dataRs['user_info'] = array($data);
                        $this->load->view('User_Admin/Update', $dataRs);
                    }
                }
            } else {
                $data = array(
                    'id' => $this->input->post('id'),
                    'username' => $this->input->post('username'),
                    'email' => $this->input->post('email'),
                );
                $check = $this->_User_Admin->_check_update($id, $data);
                if ($check['status'] == 1) {
                    $data = $this->_User_Admin->_update_user($id, $data);
                    $data['user'] = $this->_User_Admin->_view_all_user();
                    $this->load->view('User_Admin/Index', $data);
                } else {
                    $dataRs = $check;
                    $dataRs['user_info'] = array($data);
                    $this->load->view('User_Admin/Update', $dataRs);
                }
            }
        }
        $this->load->view('Templates/Footer');
    }
    public function delete()
    {
        $id = $this->input->get('id', TRUE);
        $this->db->delete('user_permission', array('admin_id' => $id));
        $this->db->delete('user_admin', array('id' => $id));
        echo '<script type="text/javascript"> alert("Success Delete"); history.back(); </script>';
    }
    function hash($string)
    {
        return hash('sha224', $string . config_item('encryption_key'));
    }
    private function _check_permission()
    {
        $this->load->model('_BaseRole');
        $permission = $this->_BaseRole->_check_permission();
        $controller = $this->router->fetch_class();
        $method = strtolower($this->router->fetch_method());
        foreach ($permission as $row) {
            if ($row['access_map'] == $controller) {
                $auth = array(
                    'index' => '1',
                    'create' => $row['create'],
                    'read' => $row['read'],
                    'update' => $row['update'],
                    'delete' => $row['delete']
                );
            }
        }
        if ($auth[$method] == 1) {
            $this->load->model('_BaseRole');
            $header['data'] = $this->_BaseRole->_check_permission();
            $this->load->view('Templates/Header', $header);
            return TRUE;
        } else {
            echo '<script type="text/javascript"> alert("Access Denied"); window.location.href = "' . site_url("$controller") . '"; </script>';
            die;
            return FALSE;
        }
    }
}

/* End of Index Controllername.php */
