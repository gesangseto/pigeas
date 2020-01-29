<?php
defined('BASEPATH') or exit('No direct script access allowed');

class _BaseRole extends CI_Model
{
  public function _check_permission()
  {
    $id = $this->session->userdata('id');
    $query_access_map = $this->db->query("SELECT * FROM `user_permission` AS `A` 
                            JOIN `user_access_map` AS `B` ON `A`.`access_map_id` = `B`.`id` 
                            JOIN `user_parent_map` AS `C` ON `B`.`parent_map_id` = `C`.`id` 
                            WHERE `admin_id` = '$id' ORDER BY parent_map ASC");
    $i = 0;
    if ($query_access_map->num_rows() > 0) {
      foreach ($query_access_map->result_array() as $row) {
        $data[$i] = $row;
        $i++;
      }
      return $data;
    } else {
      return FALSE;
    }
  }
}
