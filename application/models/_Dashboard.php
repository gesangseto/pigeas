<?php
defined('BASEPATH') or exit('No direct script access allowed');

class _Dashboard extends CI_Model
{
    public function _get_all_project()
    {
        $data = $this->db->get_where('project', array('deleted' => 0));
        if ($data->num_rows() > 0) {
            $response = $data->result_array();
        } else {
            $response = array(
                'status' => 0,
                'message' => 'No data'
            );
        }
        return $response;
    }
    public function _get_all_running_project()
    {
        $data = $this->db->get_where('project', array('deleted' => 0, 'status' => 'Running'));
        if ($data->num_rows() > 0) {
            $response = $data->result_array();
        } else {
            $response = array(
                'status' => 0,
                'message' => 'No data'
            );
        }
        return $response;
    }
}
