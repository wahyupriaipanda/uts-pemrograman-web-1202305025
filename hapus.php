<?php
// Proses hapus data mahasiswa berdasarkan id (UTS Pemrograman Web)
include 'koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id='$id'");
header("location:index.php");
?>
<?php
include 'koneksi.php';
$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT foto FROM mahasiswa WHERE id='$id'");
$d = mysqli_fetch_array($data);
$foto = $d['foto'];
if ($foto != "") {
    unlink("upload/" . $foto);
}

mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id='$id'");
header("location:index.php");
?>
