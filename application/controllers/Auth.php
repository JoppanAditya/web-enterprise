<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_auth');
    }

    public function index()
    {
        $data['page'] = 'Login';

        $this->load->view('templates/header', $data);
        $this->load->view('auth/login');
        $this->load->view('templates/footer');
    }

    public function login()
    {
        if ($this->input->post()) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');

            $user = $this->M_auth->cek_login($username, $password);

            if ($user && $this->form_validation->run() == TRUE) {
                $this->session->set_userdata([
                    'id_user' => $user['id_user'],
                    'username' => $user['username'],
                    'role' => $user['role'],
                    'email' => $user['email'],
                    'foto' => $user['foto'],
                    'logged_in' => true
                ]);
                $this->session->set_flashdata('success', 'Login berhasil!');
                redirect('dashboard');
            } elseif ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error', 'Username atau Password tidak boleh kosong!');
                redirect('auth');
            } else {
                $this->session->set_flashdata('error', 'Username atau Password salah!');
                redirect('auth');
            }
        } else {
            redirect('auth');
        }
    }

    public function register()
    {
        $data['page'] = 'Register';

        $input = [
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
        ];

        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[20]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('terms', 'Terms', 'required', ['required' => 'You must agree to the terms.']);

        if ($this->db->get_where('tb_users', ['username' => $input['username']])->row_array()) {
            $this->session->set_flashdata('error', 'Username sudah terdaftar!');
            redirect('auth/register');
        }

        if ($this->db->get_where('tb_users', ['email' => $input['email']])->row_array()) {
            $this->session->set_flashdata('error', 'Email sudah terdaftar!');
            redirect('auth/register');
        }

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('auth/register');
            $this->load->view('templates/footer');
        } else {
            $input['password'] = password_hash($input['password'], PASSWORD_DEFAULT);
            if ($this->db->insert('tb_users', $input)) {
                $this->session->set_flashdata('success', 'Registrasi berhasil! Silahkan login.');
                redirect('auth');
            } else {
                $this->session->set_flashdata('error', 'Registrasi gagal! Silahkan coba lagi.');
                redirect('auth/register');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
