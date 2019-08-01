<?php
require_once "prosses/connect.php";
include "prosses/validasi.php"; 
if(isset($_POST['nama_jenis'])){
$nama=$_POST['nama_jenis'];
$ket=$_POST['keterangan'];
$q = mysqli_query($sambung,"INSERT INTO `jenis`(`id_jenis`, `nama_jenis`, `keterangan`) VALUES (NULL,'$nama','$ket')");
header('location:home.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="assets/css/form.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/form.css">
    <title>Edit Data</title>
</head>
<body>
    <center><h1>PENAMBAHAN JENIS</h1></center>
    <div class="box">
        <center>
    <form method="post">
        <div class="edit-inv">
        <input type="text" name="nama_jenis" placeholder="Nama Jenis" required>
        </div>
        <div class="edit-inv">
        <input type="text" name="keterangan" placeholder="Keterangan" required>
        </div>
        <input type="submit" value="Tambah" class="btn">
        </div>
        </center>
    </form>
    </div>
</body>
</html>
