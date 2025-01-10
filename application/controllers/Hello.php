<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hello extends CI_Controller
{
    public function index()
    {
        $this->load->model('m_mhs');
        $data['mahasiswa'] = $this->m_mhs->get_data();
        $this->load->view('hello_view', $data);
    }
}
