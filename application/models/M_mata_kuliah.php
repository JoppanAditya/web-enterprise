<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_mata_kuliah extends CI_Model
{
    public function get_all_data()
    {
        return $this->db->get('tb_mata_kuliah')->result();
    }

    public function get_data_by_id($id)
    {
        return $this->db->get_where('tb_mata_kuliah', ['id' => $id])->row();
    }

    public function insert_data($data)
    {
        return $this->db->insert('tb_mata_kuliah', $data);
    }

    public function update_data($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('tb_mata_kuliah', $data);
    }

    public function delete_data($id)
    {
        return $this->db->delete('tb_mata_kuliah', ['id' => $id]);
    }

    public function count_all()
    {
        return $this->db->count_all('tb_mata_kuliah');
    }
}
