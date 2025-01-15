<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kelas extends CI_Model
{
    public function get_all_data()
    {
        return $this->db->get('tb_kelas')->result();
    }

    public function insert_data($data)
    {
        return $this->db->insert('tb_kelas', $data);
    }

    public function update_data($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('tb_kelas', $data);
    }

    public function delete_data($id)
    {
        return $this->db->delete('tb_kelas', ['id' => $id]);
    }
}
