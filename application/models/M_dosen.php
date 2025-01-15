<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_dosen extends CI_Model
{
    public function get_data()
    {
        $query = $this->db->get('tb_dosen');
        return $query->result();
    }

    public function insert_data($data)
    {
        return $this->db->insert('tb_dosen', $data);
    }

    public function delete_data($id)
    {
        return $this->db->delete('tb_dosen', ['id' => $id]);
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('tb_dosen', ['id' => $id])->row();
    }

    public function update_data($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('tb_dosen', $data);
    }

    public function count_all()
    {
        return $this->db->count_all('tb_dosen');
    }

    public function get_dosen_data()
    {
        $this->db->select('prodi, COUNT(*) as total');
        $this->db->group_by('prodi');
        return $this->db->get('tb_dosen')->result();
    }
}
