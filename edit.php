<?php
require_once "prosses/connect.php";
include "prosses/validasi.php"; 
$id = $_GET['id'];
if(isset($_POST['nama'])){
if($_POST['nama']!="" && $_POST['tgl_registrasi']!="" && $_POST['deskripsi']!="" && $_POST['jumlah']!="" && $_POST['jenis']!="" && $_POST['stok_tersedia']!=""){
$nama = $_POST['nama'];
$deskripsi = $_POST['deskripsi'];
$jumlah = $_POST['jumlah'];
$jenis = $_POST['jenis'];
$tgl_registrasi = $_POST['tgl_registrasi'];
$stok_tersedia = $_POST['stok_tersedia'];
$editquery = mysqli_query($sambung,"UPDATE inventaris SET nama = '$nama', deskripsi = '$deskripsi', jumlah = '$jumlah', id_jenis = '$jenis', tgl_registrasi = '$tgl_registrasi' , stok_tersedia='$stok_tersedia' WHERE id_inventaris='$id'");
header('location:home.php');
}
}
$inven = mysqli_query($sambung,"SELECT * from inventaris where id_inventaris = '$id'");
$dat = mysqli_fetch_array($inven);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="assets/css/form.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data</title>
</head>
<body>
<center><h1>EDIT INVENTARIS</h1></center>
    <div class="box">
        <center>
    <form method="post">
        <div class="edit-inv">
        <input type="text" name="nama" placeholder="Nama Inventaris" value="<?php echo $dat['nama'];  ?>" required>
        </div>
        <div class="edit-inv">
        <input type="text" name="deskripsi" placeholder="Deskripsi Inventaris" value="<?php echo $dat['deskripsi']; ?>" required>
        </div>
        <div class="edit-inv">
        <input type="number" name="jumlah" placeholder="Jumlah Total" value="<?php echo $dat['jumlah']; ?>" required>
        </div>
        <div class="edit-inv">
        <select name="jenis">
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
        <input type="date" name="tgl_registrasi" required>
        </div>
        <div class="edit-inv">
        <input type="number" name="stok_tersedia" placeholder="Stok tersedia" value="<?php echo $dat['stok_tersedia']; ?>" required>
        </div>
        <input type="submit" value="Edit" class="btn">
        </div>
    </form>
    </center>
</div>  
</body>
</html>
