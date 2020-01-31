<?php

defined('BASEPATH') or exit('No direct script access allowed');

class _User_Permission extends CI_Model
{
    public function _view_all_role()
    {
        $query = $this->db->query("SELECT A.id AS admin_id,A.username AS username,A.email AS email,B.id AS role_id,B.access_map_id AS access_map_id,count(*) as total_permission 
        FROM `user_admin` AS `A` JOIN `user_permission` AS `B` ON `A`.`id` = `B`.`admin_id` 
        GROUP BY `A`.`username` ASC");
        return ($query->result_array());
    }
    public function _view_all_user()
    {
        $query = $this->db->query("SELECT * FROM `user_admin`  GROUP BY `username` ASC");
        return ($query->result_array());
    }
    public function _view_user($id)
    {
        $query = $this->db->get_where('user_admin', array('id' => $id));
        return ($query->result_array());
    }
    public function _view_user_permission($id)
    {
        $query = $this->db->query("SELECT `A`.`id` AS `role_id`, `B`.`access_map` AS `access_map`, `C`.`parent_map` AS `parent_map` ,`A`.`create` AS `create`, `A`.`read` AS `read`,`A`.`update` AS `update`,`A`.`delete` AS `delete`
                                    FROM `user_permission` AS `A` 
                                    JOIN `user_access_map` AS `B` ON `A`.`access_map_id` = `B`.`id` 
                                    JOIN `user_parent_map`AS C ON B.parent_map_id=C.id
                                    WHERE A.admin_id=$id");
        return ($query->result_array());
    }
    public function _update_role($id, $field)
    {
        $this->db->where('id', $id);
        $query = $this->db->update('user_permission', $field);
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
    public function _view_access_map()
    {
        $query = $this->db->query("SELECT A.id AS id,A.access_map AS access_map, B.parent_map AS parent_map FROM `user_access_map` as `A`
                                    JOIN `user_parent_map` as `B` ON `A`.`parent_map_id` = `B`.`id`
                                    ORDER BY 'parent_map' ASC");
        return ($query->result_array());
    }
    public function _view_parent_map()
    {
        $query = $this->db->query("SELECT * FROM `user_parent_map` ORDER BY 'parent_map' ASC");
        return ($query->result_array());
    }
    public function _check_role($field)
    {
        $query = $this->db->get_where('user_permission', array('admin_id' => $field['admin_id'], 'access_map_id' => $field['access_map_id']));
        if ($query->num_rows() == 0) {
            $data = array(
                'status' => '1',
                'message' => 'success update data'
            );
        } else {
            $data = array(
                'status' => '0',
                'message' => 'duplicate permission'
            );
        }
        return $data;
    }
    public function _create_permission($field)
    {
        $query = $this->db->insert('user_permission', $field);
        if ($query) {
            $data = array(
                'status' => '1',
                'message' => 'success add permission'
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
