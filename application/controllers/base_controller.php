<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Permission extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('id'))) {
            redirect(site_url("404"));
        }
        $this->_check_permission();
    }
    public function index()
    {
    }
    public function create()
    {
        // Here You Code for Create
    }
    public function read()
    {
        // Here You Code for Read
    }
    public function update()
    {
        // Here You Code for Update
    }
    public function delete()
    {
        // Here You Code for Delete
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
