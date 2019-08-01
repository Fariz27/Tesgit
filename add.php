<?php
require_once "prosses/connect.php";
include "prosses/validasi.php"; 
if(isset($_POST['nama'])){
if($_POST['nama']!="" && $_POST['tgl_registrasi']!="" && $_POST['deskripsi']!="" && $_POST['jumlah']!="" && $_POST['jenis']!="" && $_POST['stok_tersedia']!=""){
$id = $_GET['id'];
$nama = $_POST['nama'];
$deskripsi = $_POST['deskripsi'];
$jumlah = $_POST['jumlah'];
$jenis = $_POST['jenis'];
$tgl_registrasi = $_POST['tgl_registrasi'];
$stok_tersedia = $_POST['stok_tersedia'];
$editquery = mysqli_query($sambung,"INSERT INTO inventaris(id_inventaris, nama, deskripsi, jumlah, id_jenis, tgl_registrasi, stok_tersedia) VALUES (NULL,'$nama','$deskripsi','$jumlah','$jenis','$tgl_registrasi','$stok_tersedia')");
header('location:home.php');
}
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
    <center><h1>PENAMBAHAN INVENTARIS</h1></center>
    <div class="box">
        <center>
    <form method="post">
        <div class="edit-inv">
        <input type="text" name="nama" placeholder="Nama Inventaris" required>
        </div>
        <div class="edit-inv">
        <input type="text" name="deskripsi" placeholder="Deskripsi Inventaris" required>
        </div>
        <div class="edit-inv">
        <input type="number" name="jumlah" placeholder="Jumlah Total" required>
        </div>
        <div class="edit-inv">
        <label>Jenis</label>
        <select name="jenis" required>
        <?php
                $h=1;
                $inv = mysqli_query($sambung,"SELECT * from jenis");
                while($d = mysqli_fetch_array($inv)){
                   echo "<option value=".$d['id_jenis'].">".$d['nama_jenis']."</option>";
                }
            ?>
        </select>
        </div>
        <div class="edit-inv">
        <label>Tanggal Inventaris</label>
        <input type="date" name="tgl_registrasi" required>
        </div>
        <div class="edit-inv">
        <input type="number" name="stok_tersedia" placeholder="Stok tersedia" required>
        </div>
        <input type="submit" value="Tambah" class="btn">
        </div>
        </center>
    </form>
    </div>
</body>
</html>
