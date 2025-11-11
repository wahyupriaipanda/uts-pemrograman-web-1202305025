<!-- Update tampilan tabel mahasiswa -->
<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Data Mahasiswa</h2>
    <a href="tambah.php">+ Tambah Mahasiswa</a><br><br>

    <table border="1" cellpadding="10">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Hobi</th>
            <th>Prodi</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;
        $data = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
        while ($d = mysqli_fetch_array($data)) {
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $d['nama']; ?></td>
            <td><?= $d['nim']; ?></td>
            <td><?= $d['hobi']; ?></td>
            <td><?= $d['prodi']; ?></td>
            <td><img src="upload/<?= $d['foto']; ?>" width="80"></td>
            <td>
                <a href="edit.php?id=<?= $d['id']; ?>">Edit</a> |
                <a href="hapus.php?id=<?= $d['id']; ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
