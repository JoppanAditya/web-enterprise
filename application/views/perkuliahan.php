<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Data Perkuliahan</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Perkuliahan
                        </li>
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
                                <i class="bi bi-plus-circle"></i> Tambah Perkuliahan
                            </button>
                        </div>
                    </div>

                    <table id="perkuliahanTable" class="table table-bordered table-striped">
                        <thead>
                            <tr align="center">
                                <th>Nama Mata Kuliah</th>
                                <th>Kelas</th>
                                <th>Dosen</th>
                                <th>Hari</th>
                                <th>Waktu</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($perkuliahan as $p): ?>
                                <tr align="center">
                                    <td><?= $p->nama_mata_kuliah; ?></td>
                                    <td><?= $p->kelas; ?></td>
                                    <td><?= $p->dosen; ?></td>
                                    <td><?= $p->hari; ?></td>
                                    <td><?= $p->waktu; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $p->id; ?>"><i class="bi bi-pencil-square"></i></button>
                                        <a href="<?= base_url('perkuliahan/hapus/' . $p->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="bi bi-trash"></i></a>
                                    </td>
                                </tr>

                                <!-- Edit Modal -->
                                <div class="modal fade" id="editModal<?= $p->id; ?>" data-bs-backdrop="static" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel">Edit Perkuliahan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <?= form_open('perkuliahan/edit/' . $p->id); ?>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="nama_mata_kuliah" class="form-label">Nama Mata Kuliah</label>
                                                    <select class="form-control" id="nama_mata_kuliah" name="nama_mata_kuliah">
                                                        <?php foreach ($mata_kuliah as $mk): ?>
                                                            <option value="<?= $mk->nama; ?>" <?= $mk->nama == $p->nama_mata_kuliah ? 'selected' : ''; ?>><?= $mk->nama; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <?= form_error('nama_mata_kuliah', '<div class="text-danger">', '</div>'); ?>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="kelas" class="form-label">Kelas</label>
                                                    <select class="form-control" id="kelas" name="kelas">
                                                        <?php foreach ($kelas as $k): ?>
                                                            <option value="<?= $k->nama; ?>" <?= $k->nama == $p->kelas ? 'selected' : ''; ?>><?= $k->nama; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <?= form_error('kelas', '<div class="text-danger">', '</div>'); ?>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="dosen" class="form-label">Dosen</label>
                                                    <select class="form-control" id="dosen" name="dosen">
                                                        <?php foreach ($dosen as $d): ?>
                                                            <option value="<?= $d->nama; ?>" <?= $d->nama == $p->dosen ? 'selected' : ''; ?>><?= $d->nama; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <?= form_error('dosen', '<div class="text-danger">', '</div>'); ?>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="hari" class="form-label">Hari</label>
                                                    <select class="form-control" id="hari" name="hari">
                                                        <option value="Senin" <?= $p->hari == 'Senin' ? 'selected' : ''; ?>>Senin</option>
                                                        <option value="Selasa" <?= $p->hari == 'Selasa' ? 'selected' : ''; ?>>Selasa</option>
                                                        <option value="Rabu" <?= $p->hari == 'Rabu' ? 'selected' : ''; ?>>Rabu</option>
                                                        <option value="Kamis" <?= $p->hari == 'Kamis' ? 'selected' : ''; ?>>Kamis</option>
                                                        <option value="Jumat" <?= $p->hari == 'Jumat' ? 'selected' : ''; ?>>Jumat</option>
                                                    </select>
                                                    <?= form_error('hari', '<div class="text-danger">', '</div>'); ?>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="waktu" class="form-label">Waktu</label>
                                                    <input type="time" class="form-control" id="waktu" name="waktu" value="<?= $p->waktu; ?>">
                                                    <?= form_error('waktu', '<div class="text-danger">', '</div>'); ?>
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
                <h5 class="modal-title" id="addModalLabel">Tambah Perkuliahan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('perkuliahan/tambah'); ?>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="nama_mata_kuliah" class="form-label">Nama Mata Kuliah</label>
                    <select class="form-control" id="nama_mata_kuliah" name="nama_mata_kuliah">
                        <option selected disabled>Pilih Mata Kuliah</option>
                        <?php foreach ($mata_kuliah as $mk): ?>
                            <option value="<?= $mk->nama; ?>"><?= $mk->nama; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('nama_mata_kuliah', '<div class="text-danger">', '</div>'); ?>
                </div>
                <div class="mb-3">
                    <label for="kelas" class="form-label">Kelas</label>
                    <select class="form-control" id="kelas" name="kelas">
                        <option selected disabled>Pilih Kelas</option>
                        <?php foreach ($kelas as $k): ?>
                            <option value="<?= $k->nama; ?>"><?= $k->nama; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('kelas', '<div class="text-danger">', '</div>'); ?>
                </div>
                <div class="mb-3">
                    <label for="dosen" class="form-label">Dosen</label>
                    <select class="form-control" id="dosen" name="dosen">
                        <option selected disabled>Pilih Dosen</option>
                        <?php foreach ($dosen as $d): ?>
                            <option value="<?= $d->nama; ?>"><?= $d->nama; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('dosen', '<div class="text-danger">', '</div>'); ?>
                </div>
                <div class="mb-3">
                    <label for="hari" class="form-label">Hari</label>
                    <select class="form-control" id="hari" name="hari">
                        <option selected disabled>Pilih Hari</option>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        <option value="Sabtu">Sabtu</option>
                        <option value="Minggu">Minggu</option>
                    </select>
                    <?= form_error('hari', '<div class="text-danger">', '</div>'); ?>
                </div>
                <div class="mb-3">
                    <label for="waktu" class="form-label">Waktu</label>
                    <input type="time" class="form-control" id="waktu" name="waktu">
                    <?= form_error('waktu', '<div class="text-danger">', '</div>'); ?>
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
        $('#perkuliahanTable').DataTable({
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
