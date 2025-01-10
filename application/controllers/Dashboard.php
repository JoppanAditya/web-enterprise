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
        $data['page'] = 'Dashboard';
        $data['hasil'] = $this->m_mhs->jum_mhs_perjurusan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dashboard');
        $this->load->view('templates/copyright');
        $this->load->view('templates/footer');
    }
}
