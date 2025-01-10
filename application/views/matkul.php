<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Data Mata Kuliah</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Mata Kuliah
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
                                <i class="bi bi-plus-circle"></i> Tambah Mata Kuliah
                            </button>
                        </div>
                    </div>

                    <table id="mataKuliahTable" class="table table-bordered table-striped">
                        <thead>
                            <tr align="center">
                                <th>Nama Mata Kuliah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($mata_kuliah as $mk): ?>
                                <tr align="center">
                                    <td><?= $mk->nama; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $mk->id; ?>"><i class="bi bi-pencil-square"></i></button>
                                        <a href="<?= base_url('matkul/hapus/' . $mk->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus mata kuliah ini?')"><i class="bi bi-trash"></i></a>
                                    </td>
                                </tr>

                                <!-- Edit Modal -->
                                <div class="modal fade" id="editModal<?= $mk->id; ?>" tabindex="-1" data-bs-backdrop="static" aria-labelledby="editModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel">Edit Mata Kuliah</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <?= form_open('matkul/edit/' . $mk->id); ?>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="nama" class="form-label">Nama Mata Kuliah</label>
                                                    <input type="text" class="form-control" id="nama" name="nama_mata_kuliah" value="<?= $mk->nama; ?>">
                                                    <?= form_error('nama_mata_kuliah', '<div class="text-danger">', '</div>'); ?>
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
                <h5 class="modal-title" id="addModalLabel">Tambah Mata Kuliah</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('matkul/tambah'); ?>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Mata Kuliah</label>
                    <input type="text" class="form-control" id="nama" name="nama_mata_kuliah" value="<?= set_value('nama_mata_kuliah'); ?>">
                    <?= form_error('nama_mata_kuliah', '<div class="text-danger">', '</div>'); ?>
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
        $('#mataKuliahTable').DataTable({
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
