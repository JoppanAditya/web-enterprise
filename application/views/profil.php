<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Profil Pengguna</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profil</li>
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
                            <h5 class="card-title">Informasi Profil</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="<?= base_url('assets/img/' . $user->foto); ?>" class="img-fluid rounded-3 h-100 w-auto" alt="Foto Profil">
                                </div>
                                <div class="col-md-8">
                                    <table class="table table-borderless">
                                        <tr>
                                            <th>Nama</th>
                                            <td><?= $user->username; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Role</th>
                                            <td><?= $user->role; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td><?= $user->email; ?></td>
                                        </tr>
                                    </table>
                                    <a href="<?= base_url('profil/edit'); ?>" class="btn btn-primary">Edit Profil</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
