<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user', 'm_user');
        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['page'] = 'Pengaturan';
        $data['user'] = $this->m_user->get_user_by_id($this->session->userdata('user_id'));

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pengaturan', $data);
        $this->load->view('templates/copyright');
        $this->load->view('templates/footer');
    }

    public function update_password()
    {
        $this->_validate_password();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $this->m_user->update_user($this->session->userdata('id_user'), ['password' => $password]);
            $this->session->set_flashdata('success', 'Password berhasil diperbarui');
            redirect('pengaturan');
        }
    }

    private function _validate_password()
    {
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('password_confirm', 'Konfirmasi Password', 'required|matches[password]');
    }
}
