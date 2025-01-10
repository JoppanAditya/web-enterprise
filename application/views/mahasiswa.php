<main class="app-main"> <!--begin::App Content Header-->
    <div class="app-content-header"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Data Mahasiswa</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Mahasiswa
                        </li>
                    </ol>
                </div>
            </div> <!--end::Row-->
        </div> <!--end::Container-->
    </div> <!--end::App Content Header--> <!--begin::App Content-->
    <div class="app-content"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row g-4"> <!--begin::Col-->
                <div class="col-12">
                    <div class="d-flex justify-content-between align-content-center mb-4">
                        <div>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                                <i class="bi bi-plus-circle"></i> Tambah Mahasiswa
                            </button>
                            <a class="btn btn-outline-danger ms-2" href="<?= base_url('mahasiswa/print'); ?>"><i class="bi bi-printer-fill"></i> Print</a>
                            <button class="btn btn-outline-secondary dropdown-toggle ms-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-file-earmark-arrow-down-fill"></i></i> Export
                            </button>
                            <ul class="dropdown-menu">
                                <li> <a class="dropdown-item" href="<?= base_url('mahasiswa/pdf'); ?>"><i class="bi bi-file-earmark-pdf-fill"></i> PDF</a></li>
                                <li> <a class="dropdown-item" href="<?= base_url('mahasiswa/excel'); ?>"><i class="bi bi-file-earmark-spreadsheet-fill"></i> Excel</a></li>
                            </ul>
                        </div>
                        <div class="navbar-form">
                            <?= form_open('mahasiswa/search'); ?>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Search" name="keyword">
                                <button class="btn btn-success" type="submit">Cari</button>
                            </div>
                            <?= form_close(); ?>
                        </div>
                    </div>

                    <table class="table table-striped">
                        <tr align="center">
                            <th>NO</th>
                            <th>NAMA MAHASISWA</th>
                            <th>NIM</th>
                            <th>TANGGAL LAHIR</th>
                            <th>JURUSAN</th>
                            <th colspan="3">AKSI</th>
                        </tr>
                        <?php $no = $start + 1;
                        foreach ($mahasiswa as $m): ?>
                            <tr align="center">
                                <td><?= $no++; ?></td>
                                <td><?= $m->nama; ?></td>
                                <td><?= $m->nim; ?></td>
                                <td><?= $m->tgl_lahir; ?></td>
                                <td><?= $m->jurusan; ?></td>
                                <td>
                                    <?= anchor('mahasiswa/detail/' . $m->id, '<button type="button" class="btn btn-primary btn-sm"><i class="bi bi-search-heart"></i></button>'); ?>
                                </td>
                                <td>
                                    <?= anchor('mahasiswa/edit/' . $m->id, '<button type="button" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button>'); ?>
                                </td>
                                <td onclick="javascript: return confirm('Anda yakin ingin hapus?')">
                                    <?= anchor('mahasiswa/hapus/' . $m->id, '<button type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>'); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>

                    <div class="d-flex justify-content-between">
                        <div class="mb-3">
                            Menampilkan <?= $start + 1; ?>-<?= min($start + $per_page, $total_rows); ?> dari <?= $total_rows; ?> mahasiswa
                        </div>
                        <?= $this->pagination->create_links(); ?>
                    </div>

                </div> <!-- /.col -->
            </div> <!--end::Row-->
        </div> <!--end::Container-->
    </div> <!--end::App Content-->
</main> <!--end::App Main-->

<!-- Modal -->
<div class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class=" modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addModalLabel">Form Input Data Mahasiswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open_multipart('mahasiswa/tambah'); ?>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Mahasiswa</label>
                    <input type="text" class="form-control <?= form_error('nama') ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= set_value('nama'); ?>">
                    <div class="invalid-feedback">
                        <?= form_error('nama'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" class="form-control <?= form_error('nim') ? 'is-invalid' : ''; ?>" id="nim" name="nim" value="<?= set_value('nim'); ?>">
                    <div class="invalid-feedback">
                        <?= form_error('nim'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control <?= form_error('tgl_lahir') ? 'is-invalid' : ''; ?>" id="tgl_lahir" name="tgl_lahir" value="<?= set_value('tgl_lahir'); ?>">
                    <div class="invalid-feedback">
                        <?= form_error('tgl_lahir'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="jurusan" class="form-label">Jurusan</label>
                    <input type="text" class="form-control <?= form_error('jurusan') ? 'is-invalid' : ''; ?>" id="jurusan" name="jurusan" value="<?= set_value('jurusan'); ?>">
                    <div class="invalid-feedback">
                        <?= form_error('jurusan'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control <?= form_error('alamat') ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" value="<?= set_value('alamat'); ?>">
                    <div class="invalid-feedback">
                        <?= form_error('alamat'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Alamat Email</label>
                    <input type="text" class="form-control <?= form_error('email') ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= set_value('email'); ?>">
                    <div class="invalid-feedback">
                        <?= form_error('email'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="telepon" class="form-label">Nomor Telepon</label>
                    <input type="text" class="form-control <?= form_error('telepon') ? 'is-invalid' : ''; ?>" id="telepon" name="telepon" value="<?= set_value('telepon'); ?>">
                    <div class="invalid-feedback">
                        <?= form_error('telepon'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <input class="form-control <?= form_error('foto') ? 'is-invalid' : ''; ?>" type="file" id="foto" name="foto">
                    <div class="invalid-feedback">
                        <?= form_error('foto'); ?>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>
