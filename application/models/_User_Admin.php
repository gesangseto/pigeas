<?php

defined('BASEPATH') or exit('No direct script access allowed');

class _User_Admin extends CI_Model
{
    public function _view_all_user()
    {
        $query = $this->db->get('user_admin');
        return ($query->result_array());
    }
    public function _view_user($id)
    {
        $query = $this->db->get_where('user_admin', array('id' => $id));
        return ($query->result_array());
    }
    public function _check_update($id, $field)
    {
        $check_email = $this->db->get_where('user_admin', array('id!=' => $id, 'email' => $field['email']), 1);
        $check_username = $this->db->get_where('user_admin', array('id!=' => $id, 'username' => $field['username']), 1);
        if ($check_email->num_rows() > 0) {
            $data = array(
                'status' => '0',
                'message' => 'duplicate email'
            );
        } else if ($check_username->num_rows() > 0) {
            $data = array(
                'status' => '0',
                'message' => 'duplicate username'
            );
        } else {
            $data = array(
                'status' => '1',
                'message' => 'data ready'
            );
        }
        return $data;
    }
    public function _update_user($id, $field)
    {
        $this->db->where('id', $id);
        $query = $this->db->update('user_admin', $field);
        if ($query == 1) {
            $data = array(
                'status' => '1',
                'message' => 'success update data'
            );
        } else {
            $data = array(
                'status' => '0',
                'message' => 'system error'
            );
        }
        return $data;
    }
}
