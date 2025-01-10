<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perkuliahan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_perkuliahan', 'm_perkuliahan');
        $this->load->model('M_dosen', 'm_dosen');
        $this->load->model('M_kelas', 'm_kelas');
        $this->load->model('M_mata_kuliah', 'm_matkul');
        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['page'] = 'Perkuliahan';
        $data['perkuliahan'] = $this->m_perkuliahan->get_all_data();
        $data['dosen'] = $this->m_dosen->get_data();
        $data['kelas'] = $this->m_kelas->get_all_data();
        $data['mata_kuliah'] = $this->m_matkul->get_all_data();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('perkuliahan', $data);
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
                'nama_mata_kuliah' => $this->input->post('nama_mata_kuliah'),
                'kelas' => $this->input->post('kelas'),
                'dosen' => $this->input->post('dosen')
            ];
            $this->m_perkuliahan->insert_data($data);

            // Update supervisor in kelas table
            $this->m_kelas->update_supervisor($data['kelas'], $data['dosen']);

            $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
            redirect('perkuliahan');
        }
    }

    public function edit($id)
    {
        $this->_validate();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = [
                'nama_mata_kuliah' => $this->input->post('nama_mata_kuliah'),
                'kelas' => $this->input->post('kelas'),
                'dosen' => $this->input->post('dosen')
            ];
            $this->m_perkuliahan->update_data($id, $data);

            // Update supervisor in kelas table
            $this->m_kelas->update_supervisor($data['kelas'], $data['dosen']);

            $this->session->set_flashdata('success', 'Data berhasil diupdate');
            redirect('perkuliahan');
        }
    }

    public function hapus($id)
    {
        $this->m_perkuliahan->delete_data($id);
        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect('perkuliahan');
    }

    private function _validate()
    {
        $this->form_validation->set_rules('nama_mata_kuliah', 'Nama Mata Kuliah', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('dosen', 'Dosen', 'required');
    }
}
