<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id='$id'");
$d = mysqli_fetch_array($data);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Edit Mahasiswa</h2>
    <a href="index.php">Kembali</a><br><br>

    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $d['id']; ?>">
        <label>Nama:</label><br>
        <input type="text" name="nama" value="<?= $d['nama']; ?>"><br><br>

        <label>NIM:</label><br>
        <input type="text" name="nim" value="<?= $d['nim']; ?>"><br><br>

        <label>Hobi:</label><br>
        <input type="text" name="hobi" value="<?= $d['hobi']; ?>"><br><br>

        <label>Prodi:</label><br>
        <input type="text" name="prodi" value="<?= $d['prodi']; ?>"><br><br>

        <label>Foto:</label><br>
        <input type="file" name="foto"><br>
        <small>Foto saat ini:</small><br>
        <img src="upload/<?= $d['foto']; ?>" width="100"><br><br>

<input type="submit" name="submit" value="Update Data">
    </form>

    <?php
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $hobi = $_POST['hobi'];
        $prodi = $_POST['prodi'];

        $foto_baru = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];

        if ($foto_baru != "") {
            move_uploaded_file($tmp, "upload/" . $foto_baru);
            mysqli_query($koneksi, "UPDATE mahasiswa SET nama='$nama', nim='$nim', hobi='$hobi', prodi='$prodi', foto='$foto_baru' WHERE id='$id'");
        } else {
            mysqli_query($koneksi, "UPDATE mahasiswa SET nama='$nama', nim='$nim', hobi='$hobi', prodi='$prodi' WHERE id='$id'");
        }

        echo "<script>alert('Data berhasil diupdate');window.location='index.php';</script>";
    }
    ?>
</body>
</html>

