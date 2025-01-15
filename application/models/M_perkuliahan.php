<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_perkuliahan extends CI_Model
{
    public function get_all_data()
    {
        return $this->db->get('tb_perkuliahan')->result();
    }

    public function get_data_by_id($id)
    {
        return $this->db->get_where('tb_perkuliahan', ['id' => $id])->row();
    }

    public function insert_data($data)
    {
        return $this->db->insert('tb_perkuliahan', $data);
    }

    public function update_data($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('tb_perkuliahan', $data);
    }

    public function delete_data($id)
    {
        return $this->db->delete('tb_perkuliahan', ['id' => $id]);
    }

    public function count_all()
    {
        return $this->db->count_all('tb_perkuliahan');
    }

    public function get_perkuliahan_data()
    {
        $this->db->select('nama_mata_kuliah, COUNT(*) as total');
        $this->db->group_by('nama_mata_kuliah');
        return $this->db->get('tb_perkuliahan')->result();
    }

    public function get_jadwal_by_dosen($dosen_id)
    {
        $this->db->select('nama_mata_kuliah, kelas, hari, waktu');
        $this->db->where('dosen', $dosen_id);
        return $this->db->get('tb_perkuliahan')->result();
    }
}
