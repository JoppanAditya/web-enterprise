<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('M_mahasiswa', 'm_mhs');
        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['page'] = 'Mahasiswa';

        $config['total_rows'] = $this->m_mhs->countMahasiswa();
        $config['per_page'] = 5;

        $this->pagination->initialize($config);

        $page = ($this->input->get('page')) ? $this->input->get('page') : 1;
        $start = ($page - 1) * $config['per_page'];

        $data['mahasiswa'] = $this->m_mhs->get_data($config['per_page'], $start);
        $data['total_rows'] = $config['total_rows'];
        $data['start'] = $start;
        $data['per_page'] = $config['per_page'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('mahasiswa', $data);
        $this->load->view('templates/copyright');
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->_validate();

        if ($this->form_validation->run() == FALSE) {
            return redirect('mahasiswa');
        } else {
            $nama = $this->input->post('nama');
            $nim = $this->input->post('nim');
            $tgl_lahir = $this->input->post('tgl_lahir');
            $jurusan = $this->input->post('jurusan');
            $alamat = $this->input->post('alamat');
            $email = $this->input->post('email');
            $telepon = $this->input->post('telepon');
            $foto = $_FILES['foto'];
            if ($foto['name'] != '') {
                $config['upload_path'] = './assets/img/user';
                $config['allowed_types'] = 'jpg|png|jpeg';

                $this->load->library('upload');
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('foto')) {
                    $this->session->set_flashdata('error', 'Gagal mengunggah foto.');
                    redirect('mahasiswa');
                    return;
                } else {
                    $foto = $this->upload->data('file_name');
                }
            }

            $data = [
                'nama' => $nama,
                'nim' => $nim,
                'tgl_lahir' => $tgl_lahir,
                'jurusan' => $jurusan,
                'alamat' => $alamat,
                'email' => $email,
                'telepon' => $telepon,
                'foto' => $foto,
            ];

            if ($this->m_mhs->insert_data($data)) {
                $this->session->set_flashdata('success', 'Berhasil menambahkan data mahasiswa.');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan data mahasiswa.');
            }
            redirect('mahasiswa');
        }
    }

    public function hapus($id)
    {
        $mahasiswa = $this->m_mhs->get_data_by_id($id);

        if (!empty($mahasiswa) && isset($mahasiswa[0]->foto)) {
            $foto = $mahasiswa[0]->foto;

            if ($foto && file_exists('./assets/img/user/' . $foto)) {
                unlink('./assets/img/user/' . $foto);
            }
        }

        if ($this->m_mhs->delete_data($id)) {
            $this->session->set_flashdata('success', 'Berhasil menghapus data mahasiswa dengan id ' . $id . '.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus data mahasiswa dengan id ' . $id . '.');
        }
        redirect('mahasiswa');
    }

    public function edit($id)
    {
        $data['page'] = 'Mahasiswa';
        $data['mahasiswa'] = $this->m_mhs->get_data_by_id($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('edit', $data);
        $this->load->view('templates/copyright');
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $nim = $this->input->post('nim');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $jurusan = $this->input->post('jurusan');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $telepon = $this->input->post('telepon');

        $mahasiswa = $this->m_mhs->get_data_by_id($id);
        $foto_lama = $mahasiswa[0]->foto;

        $foto = $_FILES['foto'];

        $foto_baru = $foto_lama;

        if ($foto['name'] != '') {
            $config['upload_path'] = './assets/img/user';
            $config['allowed_types'] = 'jpg|png|jpeg';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $foto_baru = $this->upload->data('file_name');

                if ($foto_lama && file_exists('./assets/img/user/' . $foto_lama)) {
                    unlink('./assets/img/user/' . $foto_lama);
                }
            } else {
                $this->session->set_flashdata('error', 'Gagal mengunggah foto.');
                redirect('mahasiswa/edit/' . $id);
                return;
            }
        }

        $data = [
            'nama' => $nama,
            'nim' => $nim,
            'tgl_lahir' => $tgl_lahir,
            'jurusan' => $jurusan,
            'alamat' => $alamat,
            'email' => $email,
            'telepon' => $telepon,
            'foto' => $foto_baru,
        ];

        if ($this->m_mhs->update_data($id, $data)) {
            $this->session->set_flashdata('success', 'Berhasil mengubah data mahasiswa dengan id ' . $id . '.');
        } else {
            $this->session->set_flashdata('error', 'Gagal mengubah data mahasiswa dengan id ' . $id . '.');
        }
        redirect('mahasiswa');
    }

    public function detail($id)
    {
        $data['page'] = 'Mahasiswa';
        $data['mahasiswa'] = $this->m_mhs->get_data_by_id($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('detail', $data);
        $this->load->view('templates/copyright');
        $this->load->view('templates/footer');
    }

    public function print()
    {
        $data['page'] = 'Print Data';
        $data['mahasiswa'] = $this->m_mhs->get_data();
        $this->load->view('templates/header', $data);
        $this->load->view('print_mahasiswa', $data);
        $this->load->view('templates/footer');
    }

    public function search()
    {
        $data['page'] = 'Mahasiswa';
        $keyword = $this->input->post('keyword');
        $data['mahasiswa'] = $this->m_mhs->search($keyword);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('mahasiswa', $data);
        $this->load->view('templates/copyright');
        $this->load->view('templates/footer');
    }

    public function pdf()
    {
        $this->load->library('Pdf');
        error_reporting(0);
        $pdf = new FPDF('P', 'mm', 'Letter');
        $mahasiswa = $this->m_mhs->get_data();
        $no = 0;

        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 7, 'DAFTAR MAHASISWA', 0, 1, 'C');
        $pdf->Cell(10, 7, '', 0, 1);

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(10, 10, 'No', 1, 0, 'C');
        $pdf->Cell(60, 10, 'Nama Mahasiswa', 1, 0, 'C');
        $pdf->Cell(30, 10, 'NIM', 1, 0, 'C');
        $pdf->Cell(50, 10, 'Tanggal Lahir', 1, 0, 'C');
        $pdf->Cell(50, 10, 'Jurusan', 1, 1, 'C');

        $pdf->SetFont('Arial', '', 10);
        foreach ($mahasiswa as $data) {
            $no++;
            $pdf->Cell(10, 10, $no, 1, 0, 'C');
            $pdf->Cell(60, 10, $data->nama, 1, 0);
            $pdf->Cell(30, 10, $data->nim, 1, 0);
            $pdf->Cell(50, 10, $data->tgl_lahir, 1, 0);
            $pdf->Cell(50, 10, $data->jurusan, 1, 1);
        }
        $pdf->Output();
    }

    public function excel()
    {
        $mahasiswa = $this->m_mhs->get_data();

        include_once APPPATH . '/third_party/xlsxwriter.class.php';
        ini_set('display_errors', 0);
        ini_set('log_errors', 1);
        error_reporting(E_ALL & ~E_NOTICE);

        $filename = "report-" . date('d-m-Y-H-i-s') . ".xlsx";
        header('Content-disposition: attachment; filename="' . XLSXWriter::sanitize_filename($filename) . '"');
        header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header("Content-Transfer-Encoding: binary");
        header("Cache-Control: must-revalidate");
        header("Pragma: public");

        $styles = [
            'widths' => [3, 20, 30, 40],
            'font' => 'Arial',
            'font-size' => 10,
            'font-style' => 'bold',
            'fill' => '#eee',
            'halign' => 'center',
            'border' => 'left,right,top,bottom'
        ];

        $styles2 = [
            [
                'font' => 'Arial',
                'font-size' => 10,
                'font-style' => 'bold',
                'fill' => '#eee',
                'halign' => 'left',
                'border' => 'left,right,top,bottom'
            ],
            ['fill' => '#ffc'],
            ['fill' => '#ccf'],
            ['fill' => '#cff'],
        ];

        $header = [
            'No' => 'integer',
            'Nama Mahasiswa' => 'String',
            'NIM' => 'string',
            'Tanggal Lahir' => 'string',
            'Jurusan' => 'string'
        ];

        $writer = new XLSXWriter();
        $writer->setAuthor('Joppan Aditya');
        $writer->writeSheetHeader('Sheet1', $header, $styles);
        $no = 1;
        foreach ($mahasiswa as $data) {
            $writer->writeSheetRow('Sheet1', [$no, $data->nama, $data->nim, $data->tgl_lahir, $data->jurusan], $styles2);
            $no++;
        }
        $writer->writeToStdOut();
    }

    public function tampil_grafik()
    {
        $data['hasil'] = $this->m_mhs->jum_mhs_perjurusan();
        $this->load->view('grafik', $data);
    }

    private function _validate()
    {
        $config = [
            [
                'field' => 'nama',
                'label' => 'Nama Mahasiswa',
                'rules' => 'required|alpha_numeric_spaces'
            ],
            [
                'field' => 'nim',
                'label' => 'NIM',
                'rules' => 'required|numeric|min_length[8]|max_length[12]'
            ],
            [
                'field' => 'tgl_lahir',
                'label' => 'Tanggal Lahir',
                'rules' => 'required'
            ],
            [
                'field' => 'jurusan',
                'label' => 'Jurusan',
                'rules' => 'required|alpha_numeric_spaces'
            ],
            [
                'field' => 'alamat',
                'label' => 'Alamat',
                'rules' => 'required'
            ],
            [
                'field' => 'email',
                'label' => 'Alamat Email',
                'rules' => 'required|valid_email'
            ],
            [
                'field' => 'telepon',
                'label' => 'Nomor Telepon',
                'rules' => 'required|numeric|min_length[10]|max_length[15]'
            ]
        ];

        $this->form_validation->set_rules($config);
    }
}
