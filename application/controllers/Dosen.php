<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_dosen', 'm_dosen');
        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['page'] = 'Dosen';
        $data['dosen'] = $this->m_dosen->get_data();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dosen', $data);
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
                'nik_nidn' => $this->input->post('nik_nidn'),
                'nama' => $this->input->post('nama'),
                'prodi' => $this->input->post('prodi'),
                'alamat' => $this->input->post('alamat'),
                'email' => $this->input->post('email'),
                'telepon' => $this->input->post('telepon'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'foto' => $this->_upload_foto()
            ];
            $this->m_dosen->insert_data($data);
            $this->session->set_flashdata('success', 'Dosen berhasil ditambahkan');
            redirect('dosen');
        }
    }

    public function edit($id)
    {
        $data['page'] = 'Edit Dosen';
        $data['dosen'] = $this->m_dosen->get_by_id($id);

        $this->_validate();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $update_data = [
                'nik_nidn' => $this->input->post('nik_nidn'),
                'nama' => $this->input->post('nama'),
                'prodi' => $this->input->post('prodi'),
                'alamat' => $this->input->post('alamat'),
                'email' => $this->input->post('email'),
                'telepon' => $this->input->post('telepon'),
                'tgl_lahir' => $this->input->post('tgl_lahir')
            ];

            // Handle file upload
            if (!empty($_FILES['foto']['name'])) {
                $update_data['foto'] = $this->_upload_foto();

                // Delete old file if exists
                $old_file = $data['dosen']->foto;
                if ($old_file && file_exists('./assets/img/user/dosen/' . $old_file)) {
                    unlink('./assets/img/user/dosen/' . $old_file);
                }
            }

            $this->m_dosen->update_data($id, $update_data);
            $this->session->set_flashdata('success', 'Dosen berhasil diupdate');
            redirect('dosen');
        }
    }

    public function hapus($id)
    {
        $dosen = $this->m_dosen->get_by_id($id);
        if ($dosen->foto && file_exists('./assets/img/user/dosen/' . $dosen->foto)) {
            unlink('./assets/img/user/dosen/' . $dosen->foto);
        }
        $this->m_dosen->delete_data($id);
        $this->session->set_flashdata('success', 'Dosen berhasil dihapus');
        redirect('dosen');
    }

    public function detail($id)
    {
        $this->load->model('M_perkuliahan');

        $data['page'] = 'Dosen';
        $data['dosen'] = $this->m_dosen->get_by_id($id);
        $data['jadwal'] = $this->M_perkuliahan->get_jadwal_by_dosen($data['dosen']->nama);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('detail_dosen', $data);
        $this->load->view('templates/footer');
    }

    private function _validate()
    {
        $this->form_validation->set_rules('nik_nidn', 'NIK/NIDN', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('prodi', 'Prodi', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
    }

    private function _upload_foto()
    {
        $config['upload_path'] = './assets/img/user/dosen/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 2048;
        $config['file_name'] = $this->input->post('nik_nidn') . '_' . time();

        $this->load->library('upload');
        $this->upload->initialize($config);

        if ($this->upload->do_upload('foto')) {
            return $this->upload->data('file_name');
        } else {
            return 'default.png';
        }
    }
}
