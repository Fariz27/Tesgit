<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/form.css">
</head>
<body>
<center><h1>DAFTAR PEGAWAI</h1></center>
    <div class="box">
    <center>
    <form method="post">
        <div class="edit-inv">
        <input type="text" name="nama" placeholder="Nama Pegawai" required>
        </div>
        <div class="edit-inv">
        <input type="text" name="telepon" placeholder="No Telepon" required>
        </div>
        <div class="edit-inv">
        <input type="text" name="alamat" placeholder="Alamat" required>
        </div>
        <input type="submit" value="SUBMIT" class="btn">
    </form>
    </center>
    </div>
</body>
</html>
<?php
require_once "prosses/connect.php";
if(isset($_POST['nama'])){
$nama = $_POST['nama'];
$telepon = $_POST['telepon'];
$alamat = $_POST['alamat'];
mysqli_query($sambung,"INSERT INTO `pegawai`(`id_pegawai`, `nama_pegawai`, `telp`, `alamat`) VALUES (NULL,'$nama','$telepon','$alamat')");
header('location:home.php');
}
?>