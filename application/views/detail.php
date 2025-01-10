<main class="app-main"> <!--begin::App Content Header-->
    <div class="app-content-header"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">
                        Detail Data <?= $mahasiswa[0]->nama; ?>
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
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mt-2">
                                <?php foreach ($mahasiswa as $m): ?>
                                    <dt class="col-sm-4 mb-3">Nama Mahasiswa</dt>
                                    <dd class="col-sm-8"><?= $m->nama; ?></dd>

                                    <dt class="col-sm-4 mb-3">NIM</dt>
                                    <dd class="col-sm-8"><?= $m->nim; ?></dd>

                                    <dt class="col-sm-4 mb-3">Tanggal Lahir</dt>
                                    <dd class="col-sm-8"><?= $m->tgl_lahir; ?></dd>

                                    <dt class="col-sm-4 mb-3">Jurusan</dt>
                                    <dd class="col-sm-8"><?= $m->jurusan; ?></dd>

                                    <dt class="col-sm-4 mb-3">Alamat</dt>
                                    <dd class="col-sm-8"><?= $m->alamat; ?></dd>

                                    <dt class="col-sm-4 mb-3">Alamat Email</dt>
                                    <dd class="col-sm-8"><?= $m->email; ?></dd>

                                    <dt class="col-sm-4">Nomor Telepon</dt>
                                    <dd class="col-sm-8"><?= $m->telepon; ?></dd>

                                    <?php if ($m->foto): ?>
                                        <dt class="col-sm-4 mt-3">Foto</dt>
                                        <dd class="col-sm-8"><img src="<?= base_url('assets/img/user/') . $m->foto; ?>" alt="Foto User" height="120" class="rounded-2"></dd>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="card-header">
                            <a href="<?= base_url('mahasiswa'); ?>" class="btn btn-primary"><i class="bi bi-caret-left-fill me-1"></i>Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
