<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Data Dosen</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dosen</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row g-4">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-content-center mb-4">
                        <div>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                                <i class="bi bi-plus-circle"></i> Tambah Dosen
                            </button>
                        </div>
                    </div>

                    <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success">
                            <?= $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>

                    <table id="dosenTable" class="table table-bordered table-striped">
                        <thead>
                            <tr align="center">
                                <th>NIK/NIDN</th>
                                <th>Nama</th>
                                <th>Prodi</th>
                                <th>Tanggal Lahir</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dosen as $d): ?>
                                <tr align="center">
                                    <td><?= $d->nik_nidn; ?></td>
                                    <td><?= $d->nama; ?></td>
                                    <td><?= $d->prodi; ?></td>
                                    <td><?= $d->tgl_lahir; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm"><i class="bi bi-search-heart"></i></button>
                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $d->id; ?>"><i class="bi bi-pencil-square"></i></button>
                                        <a href="<?= base_url('dosen/hapus/' . $d->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="bi bi-trash"></i></a>
                                    </td>
                                </tr>

                                <!-- Edit Modal -->
                                <div class="modal fade" id="editModal<?= $d->id; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel">Edit Dosen</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <?= form_open_multipart('dosen/edit/' . $d->id); ?>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="nik_nidn" class="form-label">NIK/NIDN</label>
                                                    <input type="text" class="form-control <?= form_error('nik_nidn') ? 'is-invalid' : ''; ?>" id="nik_nidn" name="nik_nidn" value="<?= set_value('nik_nidn', $d->nik_nidn); ?>">
                                                    <div class="invalid-feedback">
                                                        <?= form_error('nik_nidn'); ?>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nama" class="form-label">Nama</label>
                                                    <input type="text" class="form-control <?= form_error('nama') ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= set_value('nama', $d->nama); ?>">
                                                    <div class="invalid-feedback">
                                                        <?= form_error('nama'); ?>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="prodi" class="form-label">Prodi</label>
                                                    <input type="text" class="form-control <?= form_error('prodi') ? 'is-invalid' : ''; ?>" id="prodi" name="prodi" value="<?= set_value('prodi', $d->prodi); ?>">
                                                    <div class="invalid-feedback">
                                                        <?= form_error('prodi'); ?>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="alamat" class="form-label">Alamat</label>
                                                    <input type="text" class="form-control <?= form_error('alamat') ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" value="<?= set_value('alamat', $d->alamat); ?>">
                                                    <div class="invalid-feedback">
                                                        <?= form_error('alamat'); ?>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Alamat Email</label>
                                                    <input type="text" class="form-control <?= form_error('email') ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= set_value('email', $d->email); ?>">
                                                    <div class="invalid-feedback">
                                                        <?= form_error('email'); ?>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="telepon" class="form-label">Nomor Telepon</label>
                                                    <input type="text" class="form-control <?= form_error('telepon') ? 'is-invalid' : ''; ?>" id="telepon" name="telepon" value="<?= set_value('telepon', $d->telepon); ?>">
                                                    <div class="invalid-feedback">
                                                        <?= form_error('telepon'); ?>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                                                    <input type="date" class="form-control <?= form_error('tgl_lahir') ? 'is-invalid' : ''; ?>" id="tgl_lahir" name="tgl_lahir" value="<?= set_value('tgl_lahir', $d->tgl_lahir); ?>">
                                                    <div class="invalid-feedback">
                                                        <?= form_error('tgl_lahir'); ?>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="foto" class="form-label">Foto</label>
                                                    <input class="form-control <?= form_error('foto') ? 'is-invalid' : ''; ?>" type="file" id="foto" name="foto">
                                                    <?php if (isset($upload_error)): ?>
                                                        <div class="invalid-feedback"><?= $upload_error; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                            </div>
                                            <?= form_close(); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Add Modal -->
<div class="modal fade" id="addModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Dosen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open_multipart('dosen/tambah'); ?>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="nik_nidn" class="form-label">NIK/NIDN</label>
                    <input type="text" class="form-control <?= form_error('nik_nidn') ? 'is-invalid' : ''; ?>" id="nik_nidn" name="nik_nidn" value="<?= set_value('nik_nidn'); ?>">
                    <div class="invalid-feedback">
                        <?= form_error('nik_nidn'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control <?= form_error('nama') ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= set_value('nama'); ?>">
                    <div class="invalid-feedback">
                        <?= form_error('nama'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="prodi" class="form-label">Prodi</label>
                    <input type="text" class="form-control <?= form_error('prodi') ? 'is-invalid' : ''; ?>" id="prodi" name="prodi" value="<?= set_value('prodi'); ?>">
                    <div class="invalid-feedback">
                        <?= form_error('prodi'); ?>
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
                    <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control <?= form_error('tgl_lahir') ? 'is-invalid' : ''; ?>" id="tgl_lahir" name="tgl_lahir" value="<?= set_value('tgl_lahir'); ?>">
                    <div class="invalid-feedback">
                        <?= form_error('tgl_lahir'); ?>
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

<!-- DataTables JS -->
<script>
    $(document).ready(function() {
        $('#dosenTable').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": true,
        });
    });
</script>
