<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
    public function get_user_by_id($id)
    {
        return $this->db->get_where('tb_users', ['id_user' => $id])->row();
    }

    public function update_user($id, $data)
    {
        $this->db->where('id_user', $id);
        return $this->db->update('tb_users', $data);
    }
}
