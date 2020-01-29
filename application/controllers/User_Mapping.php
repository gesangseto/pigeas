<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_Mapping extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('id'))) {
            redirect(site_url("404"));
        }
        $this->_check_permission();
        $this->load->model('_User_Mapping');
    }
    public function index()
    {
        $data['access_map'] = $this->_User_Mapping->_view_all_access_map();
        $data['parent_map'] = $this->_User_Mapping->_view_all_parent_map();
        $data['count_access_map'] = $this->_User_Mapping->_count_access_map();
        $this->load->view('User_Mapping/Index', $data);
        $this->load->view('Templates/Footer');
    }
    public function create()
    {
        if (isset($_POST['new_parent_map'])) {
            $data = array(
                'parent_map' => str_replace(' ', '_', $_POST['parent_map']),
                'icon' => $_POST['icon']
            );
            $check = $this->_User_Mapping->_check_parent_map($data);
            if ($check['status'] == 0) {
                $dataRs = $check;
            } else {
                $dataRs = $this->_User_Mapping->_create_parent_map($data);
            }
        } else if (isset($_POST['new_access_map'])) {
            $data = array(
                'access_map' => str_replace(' ', '_', $_POST['access_map']),
                'parent_map_id' => $_POST['parent_map_id']
            );
            $check = $this->_User_Mapping->_check_access_map($data);
            if ($check['status'] == 0) {
                $dataRs = $check;
            } else {
                $dataRs = $this->_User_Mapping->_create_access_map($data);
            }
        }
        $dataRs['access_map'] = $this->_User_Mapping->_view_all_access_map();
        $dataRs['parent_map'] = $this->_User_Mapping->_view_all_parent_map();
        $dataRs['count_access_map'] = $this->_User_Mapping->_count_access_map();
        $this->load->view('User_Mapping/Index', $dataRs);
    }
    public function read()
    {
        // Here You Code for Read
        $id = $_GET['id'];
        $dataRs['access_map'] = $this->_User_Mapping->_view_access_map($id);

        $this->load->view('User_Mapping/Read', $dataRs);
        $this->load->view('Templates/Footer');
    }
    public function update()
    {
        $id = $_POST['id'];
        if (isset($_POST['btn_parent_map'])) {
            $data = array(
                'parent_map' => str_replace(' ', '_', $_POST['parent_map']),
                'icon' => $_POST['icon']
            );
            $dataRs = $this->_User_Mapping->_update_parent_map($id, $data);
        } else if (isset($_POST['btn_access_map'])) {
            $data = array(
                'access_map' => str_replace(' ', '_', $_POST['access_map']),
                'parent_map_id' => $_POST['parent_map_id']
            );
            $dataRs = $this->_User_Mapping->_update_access_map($id, $data);
        }
        $data = $dataRs;
        $data['access_map'] = $this->_User_Mapping->_view_all_access_map();
        $data['parent_map'] = $this->_User_Mapping->_view_all_parent_map();
        $data['count_access_map'] = $this->_User_Mapping->_count_access_map();
        $this->load->view('User_Mapping/Index', $data);
        $this->load->view('Templates/Footer');

        // Here You Code for Update
    }
    public function delete()
    {
        if (isset($_GET['parent_map_id'])) {
            $id = $this->input->get('parent_map_id', TRUE);
            $dataRs = $this->_User_Mapping->_check_delete_parent($id);
            if ($dataRs['status'] != 0) {
                $this->db->delete('user_parent_map', array('id' => $id));
            }
        } else if (isset($_GET['access_map_id'])) {
            $id = $this->input->get('access_map_id', TRUE);
            $dataRs = $this->_User_Mapping->_check_delete_access($id);
            if ($dataRs['status'] != 0) {
                $this->db->delete('user_access_map', array('id' => $id));
            }
        } else if (isset($_GET['admin_id'])) {
            $admin_id = $this->input->get('admin_id', TRUE);
            $access_map_id = $this->input->get('map_id', TRUE);
            $this->db->delete('user_permission', array('admin_id' => $admin_id, 'access_map_id' => $access_map_id));
            $dataRs = array(
                "status" => 1,
                "message" => "Success Delete User Permission"
            );
        }
        // Here You Code for Delete
        $dataRs['access_map'] = $this->_User_Mapping->_view_all_access_map();
        $dataRs['parent_map'] = $this->_User_Mapping->_view_all_parent_map();
        $dataRs['count_access_map'] = $this->_User_Mapping->_count_access_map();
        $this->load->view('User_Mapping/Index', $dataRs);
        $this->load->view('Templates/Footer');
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
