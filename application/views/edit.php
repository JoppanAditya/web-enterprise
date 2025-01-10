<main class="app-main"> <!--begin::App Content Header-->
    <div class="app-content-header"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">
                        Update Data <?= $mahasiswa[0]->nama; ?>
                    </h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('mahasiswa'); ?>">Mahasiswa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <?= $mahasiswa[0]->nama; ?>
                        </li>
                    </ol>
                </div>
            </div> <!--end::Row-->
        </div> <!--end::Container-->
    </div> <!--end::App Content Header--> <!--begin::App Content-->
    <div class="app-content"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row g-4"> <!--begin::Col-->
                <div class="col-6">
                    <?php foreach ($mahasiswa as $m): ?>
                        <?= form_open_multipart('mahasiswa/update'); ?>
                        <input type="hidden" name="id" value="<?= $m->id; ?>">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Mahasiswa</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $m->nama; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="nim" class="form-label">NIM</label>
                            <input type="text" class="form-control" id="nim" name="nim" value="<?= $m->nim; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $m->tgl_lahir; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="jurusan" class="form-label">Jurusan</label>
                            <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?= $m->jurusan; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $m->alamat; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Alamat Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="<?= $m->email; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="telepon" class="form-label">Nomor Telepon</label>
                            <input type="text" class="form-control" id="telepon" name="telepon" value="<?= $m->telepon; ?>">
                        </div>
                        <div>
                            <label for="foto" class="form-label">Foto</label>
                            <input class="form-control" type="file" id="foto" name="foto">
                        </div>
                        <?php if ($m->foto): ?>
                            <div class="mt-3">
                                <p>Preview Foto:</p>
                                <img src="<?= base_url('assets/img/user/') . $m->foto; ?>" alt="Foto Mahasiswa" height="100" class="img-thumbnail" style="width: 200px; height: auto;">
                                <p><?= $m->foto; ?></p>
                            </div>
                        <?php endif; ?>
                        <a href="<?= base_url('mahasiswa'); ?>" class="btn btn-secondary me-3 mt-4">Batal</a>
                        <button type="submit" class="btn btn-primary mt-4">Simpan Perubahan</button>
                        <?= form_close(); ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</main>
