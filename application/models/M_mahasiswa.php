<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_mahasiswa extends CI_Model
{
    public function get_data($limit = null, $start = null)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get('tb_mahasiswa');
        return $query->result();
    }

    public function get_data_by_id($id)
    {
        $query = $this->db->get_where('tb_mahasiswa', ['id' => $id]);
        return $query->result();
    }

    public function insert_data($data)
    {
        return $this->db->insert('tb_mahasiswa', $data);
    }

    public function update_data($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('tb_mahasiswa', $data);
    }

    public function delete_data($id)
    {
        return $this->db->delete('tb_mahasiswa', ['id' => $id]);
    }

    public function search($keyword)
    {
        $this->db->select('*');
        $this->db->from('tb_mahasiswa');
        $this->db->like('nama', $keyword);
        $this->db->or_like('nim', $keyword);
        $this->db->or_like('tgl_lahir', $keyword);
        $this->db->or_like('jurusan', $keyword);
        $this->db->or_like('alamat', $keyword);
        $this->db->or_like('email', $keyword);
        $this->db->or_like('telepon', $keyword);
        return $this->db->get()->result();
    }

    public function jum_mhs_perjurusan()
    {
        $this->db->group_by('jurusan');
        $this->db->select('jurusan');
        $this->db->select('count(*) as total');
        return $this->db->from('tb_mahasiswa')->get()->result();
    }

    public function countMahasiswa()
    {
        return $this->db->count_all_results('tb_mahasiswa');
    }
}
