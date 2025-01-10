<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
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
        $data['page'] = 'Profil';
        $data['user'] = $this->m_user->get_user_by_id($this->session->userdata('id_user'));

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('profil', $data);
        $this->load->view('templates/copyright');
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['page'] = 'Edit Profil';
        $data['user'] = $this->m_user->get_user_by_id($this->session->userdata('id_user'));

        $this->_validate();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('edit_profil', $data);
            $this->load->view('templates/copyright');
            $this->load->view('templates/footer');
        } else {
            $update_data = [
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email')
            ];

            // Handle file upload
            if (!empty($_FILES['foto']['name'])) {
                $config['upload_path'] = './assets/img/user/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = 2048;
                $config['file_name'] = $this->session->userdata('id_user') . '_' . time();

                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto')) {
                    $upload_data = $this->upload->data();
                    $update_data['foto'] = $upload_data['file_name'];

                    // Delete old file if exists
                    $old_file = $data['user']->foto;
                    if ($old_file && file_exists('./assets/img/user/' . $old_file)) {
                        unlink('./assets/img/user/' . $old_file);
                    }

                    // Update session data
                    $this->session->set_userdata('foto', $upload_data['file_name']);
                } else {
                    $data['upload_error'] = $this->upload->display_errors();
                    $this->load->view('templates/header', $data);
                    $this->load->view('templates/navbar', $data);
                    $this->load->view('templates/sidebar', $data);
                    $this->load->view('edit_profil', $data);
                    $this->load->view('templates/copyright');
                    $this->load->view('templates/footer');
                    return;
                }
            }

            $this->m_user->update_user($this->session->userdata('id_user'), $update_data);
            $this->session->set_flashdata('success', 'Profil berhasil diperbarui');
            redirect('profil');
        }
    }

    private function _validate()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    }
}
