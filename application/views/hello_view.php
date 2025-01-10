<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>

    <style>
        /* CSS untuk memusatkan teks */
        h1 {
            text-align: center;
            /* Memusatkan teks */
            margin-top: 50px;
            /* Menambahkan jarak di atas */
        }
    </style>

</head>

<body>
    <div class="container">
        <h1 class="mt-5">Daftar Mahasiswa</h1>
        <table class="table table-striped mt-3">
            <thead>
                <tr>ID</tr>
                <tr>NIM</tr>
                <tr>Nama</tr>
                <tr>Alamat</tr>
            </thead>
            <tbody>
                <?php if (isset($mahasiswa) && count($mahasiswa) > 0): ?>
                    <?php foreach ($mahasiswa as $mhs): ?>
                        <tr>
                            <td><?= $mhs['id']; ?></td>
                            <td><?= $mhs['nim']; ?></td>
                            <td><?= $mhs['nama']; ?></td>
                            <td><?= $mhs['alamat']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data mahasiswa.</td>
                    </tr>
                <?php endif; ?>

            </tbody>
        </table>
    </div>
</body>

</html>
