<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mahasiswa</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Tambah Mahasiswa</h2>
    <a href="index.php">Kembali</a><br><br>

    <form method="post" enctype="multipart/form-data">
        <label>Nama:</label><br>
        <input type="text" name="nama" required><br><br>

        <label>NIM:</label><br>
        <input type="text" name="nim" required><br><br>

        <label>Hobi:</label><br>
        <input type="text" name="hobi"><br><br>

        <label>Prodi:</label><br>
        <input type="text" name="prodi"><br><br>

        <label>Foto:</label><br>
        <input type="file" name="foto"><br><br>

        <input type="submit" name="submit" value="Tambah Data">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $hobi = $_POST['hobi'];
        $prodi = $_POST['prodi'];

        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];

        if ($foto != "") {
            move_uploaded_file($tmp, "upload/" . $foto);
        }

        mysqli_query($koneksi, "INSERT INTO mahasiswa VALUES('', '$nama', '$nim', '$hobi', '$prodi', '$foto')");
        echo "<script>alert('Data berhasil disimpan');window.location='index.php';</script>";
    }
    ?>
</body>
</html>
