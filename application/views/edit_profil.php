<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Edit Profil</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Profil</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row g-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Edit Informasi Profil</h5>
                        </div>
                        <div class="card-body">
                            <?= form_open_multipart('profil/edit'); ?>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?= set_value('username', $user->username); ?>">
                                <?= form_error('username', '<div class="text-danger">', '</div>'); ?>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?= set_value('email', $user->email); ?>">
                                <?= form_error('email', '<div class="text-danger">', '</div>'); ?>
                            </div>
                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto Profil</label>
                                <input type="file" class="form-control" id="foto" name="foto">
                                <?php if (isset($upload_error)): ?>
                                    <div class="text-danger"><?= $upload_error; ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="modal-footer">
                                <a href="<?= base_url('profil'); ?>" class="btn btn-secondary me-3">Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                            <?= form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
