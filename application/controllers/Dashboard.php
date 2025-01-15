<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $this->load->model('M_mahasiswa', 'm_mhs');
        $this->load->model('M_dosen');
        $this->load->model('M_mata_kuliah', 'm_matkul');
        $this->load->model('M_perkuliahan');
        $data['page'] = 'Dashboard';
        $data['hasil'] = $this->m_mhs->jum_mhs_perjurusan();
        $data['totalMahasiswa'] = $this->m_mhs->countMahasiswa();
        $data['totalDosen'] = $this->M_dosen->count_all();
        $data['totalMatkul'] = $this->m_matkul->count_all();
        $data['totalPerkuliahan'] = $this->M_perkuliahan->count_all();
        $data['perkuliahanData'] = $this->M_perkuliahan->get_perkuliahan_data();
        $data['dosenData'] = $this->M_dosen->get_dosen_data();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dashboard');
        $this->load->view('templates/copyright');
        $this->load->view('templates/footer');
    }
}
