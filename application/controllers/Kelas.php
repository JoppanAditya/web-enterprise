<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kelas', 'm_kelas');
        $this->load->model('M_dosen', 'm_dosen');
        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['page'] = 'Kelas';
        $data['kelas'] = $this->m_kelas->get_all_data();
        $data['dosen'] = $this->m_dosen->get_data();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('kelas', $data);
        $this->load->view('templates/copyright');
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->_validate();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'kapasitas' => $this->input->post('kapasitas')
            ];
            $this->m_kelas->insert_data($data);
            $this->session->set_flashdata('success', 'Kelas berhasil ditambahkan');
            redirect('kelas');
        }
    }

    public function edit($id)
    {
        $this->_validate();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'kapasitas' => $this->input->post('kapasitas'),
                'supervisor' => $this->input->post('supervisor')
            ];
            $this->m_kelas->update_data($id, $data);
            $this->session->set_flashdata('success', 'Kelas berhasil diupdate');
            redirect('kelas');
        }
    }

    public function hapus($id)
    {
        $this->m_kelas->delete_data($id);
        $this->session->set_flashdata('success', 'Kelas berhasil dihapus');
        redirect('kelas');
    }

    private function _validate()
    {
        $this->form_validation->set_rules('nama', 'Nama Kelas', 'required');
        $this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required|integer');
    }
}
