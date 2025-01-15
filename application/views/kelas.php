<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Data Kelas</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Kelas
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
                                <i class="bi bi-plus-circle"></i> Tambah Kelas
                            </button>
                        </div>
                    </div>

                    <table id="kelasTable" class="table table-bordered table-striped">
                        <thead>
                            <tr align="center">
                                <th>Nama Kelas</th>
                                <th>Kapasitas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($kelas as $k): ?>
                                <tr align="center">
                                    <td><?= $k->nama; ?></td>
                                    <td><?= $k->kapasitas; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $k->id; ?>"><i class="bi bi-pencil-square"></i></button>
                                        <a href="<?= base_url('kelas/hapus/' . $k->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kelas ini?')"><i class="bi bi-trash"></i></a>
                                    </td>
                                </tr>

                                <!-- Edit Modal -->
                                <div class="modal fade" id="editModal<?= $k->id; ?>" tabindex="-1" data-bs-backdrop="static" aria-labelledby="editModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel">Edit Kelas</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <?= form_open('kelas/edit/' . $k->id); ?>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="nama" class="form-label">Nama Kelas</label>
                                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $k->nama; ?>">
                                                    <?= form_error('nama', '<div class="text-danger">', '</div>'); ?>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="kapasitas" class="form-label">Kapasitas</label>
                                                    <input type="number" class="form-control" id="kapasitas" name="kapasitas" value="<?= $k->kapasitas; ?>">
                                                    <?= form_error('kapasitas', '<div class="text-danger">', '</div>'); ?>
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
                <h5 class="modal-title" id="addModalLabel">Tambah Kelas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('kelas/tambah'); ?>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Kelas</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama'); ?>">
                    <?= form_error('nama', '<div class="text-danger">', '</div>'); ?>
                </div>
                <div class="mb-3">
                    <label for="kapasitas" class="form-label">Kapasitas</label>
                    <input type="number" class="form-control" id="kapasitas" name="kapasitas" value="<?= set_value('kapasitas'); ?>">
                    <?= form_error('kapasitas', '<div class="text-danger">', '</div>'); ?>
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
        $('#kelasTable').DataTable({
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
