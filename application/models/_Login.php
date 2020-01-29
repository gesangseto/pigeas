<?php
defined('BASEPATH') or exit('No direct script access allowed');

class _Login extends CI_Model
{
    public function _check_login($username, $password)
    {
        $query = $this->db->get_where('user_admin', array('username' => $username, 'password' => $password), 1);
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data = array(
                    'id' => $row['id'],
                    'username' => $row['username'],
                    'email' => $row['email']

                );
            }
            $this->session->set_userdata($data);
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
