<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Matkul extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_mata_kuliah', 'm_matkul');
        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['page'] = 'Mata Kuliah';
        $data['mata_kuliah'] = $this->m_matkul->get_all_data();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('matkul', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->_validate();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = [
                'nama' => $this->input->post('nama_mata_kuliah')
            ];
            $this->m_matkul->insert_data($data);
            $this->session->set_flashdata('success', 'Mata kuliah berhasil ditambahkan');
            redirect('matkul');
        }
    }

    public function edit($id)
    {
        $this->_validate();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = [
                'nama' => $this->input->post('nama_mata_kuliah')
            ];
            $this->m_matkul->update_data($id, $data);
            $this->session->set_flashdata('success', 'Mata kuliah berhasil diupdate');
            redirect('matkul');
        }
    }

    public function hapus($id)
    {
        $this->m_matkul->delete_data($id);
        $this->session->set_flashdata('success', 'Mata kuliah berhasil dihapus');
        redirect('matkul');
    }

    private function _validate()
    {
        $this->form_validation->set_rules('nama_mata_kuliah', 'Nama Mata Kuliah', 'required|trim|min_length[3]|max_length[50]');
    }
}
