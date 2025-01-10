<style>
    body {
        background-color: white !important;
    }
</style>

<div class="container-fluid">
    <a href="<?= base_url('mahasiswa'); ?>" class="btn btn-primary d-print-none my-4"><i class="bi bi-caret-left-fill me-1"></i>Kembali</a>

    <h1 class="h1 text-center text-primary fw-bold mb-2">Data Mahasiswa</h1>
    <table class="table table-striped table-primary table-sm caption-top">
        <caption>List Mahasiswa</caption>
        <thead>
            <tr align="center">
                <th>No</th>
                <th>Nama Mahasiswa</th>
                <th>NIM</th>
                <th>Tanggal Lahir</th>
                <th>Jurusan</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Nomor Telepon</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php
            foreach ($mahasiswa as $i => $m) : ?>
                <tr align="center">
                    <td><?= ++$i; ?></td>
                    <td><?= $m->nama; ?></td>
                    <td><?= $m->nim; ?></td>
                    <td><?= $m->tgl_lahir; ?></td>
                    <td><?= $m->jurusan; ?></td>
                    <td><?= $m->alamat; ?></td>
                    <td><?= $m->email; ?></td>
                    <td><?= $m->telepon; ?></td>
                    <td>
                        <?php if ($m->foto): ?>
                            <img src="<?= base_url('assets/img/user/') . $m->foto; ?>" alt="Foto Mahasiswa" height="150" class="rounded">
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    window.print();
</script>
