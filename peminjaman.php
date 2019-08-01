<?php 
require_once "prosses/connect.php";
include "prosses/validasi.php"; 
$inv = mysqli_query($sambung,"SELECT * from inventaris");
$cek = mysqli_num_rows($inv);
$ainv = mysqli_fetch_assoc($inv);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/form.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<center><h1>PEMINJAMAN</h1></center>\

    <div class="box">
        <center>
    <form action="prosses/ppeminjaman.php" method="post">
    <?php if(isset($_GET['barang'])){
    echo "<p style='color:red'>Barang tidak cukup</p>";
}?>
        <div class=edit-inv>
            <label>Barang</label>
        <select name="inventaris"> 
            <?php
                $inv = mysqli_query($sambung,"SELECT * from inventaris");
                while($d = mysqli_fetch_array($inv)){
                   echo "<option value=".$d['id_inventaris'].">".$d['nama']."</option>";
                }
            ?>
        </select>
        </div>
        <div class=edit-inv>
        <label>Peminjam</label>
        <select name="pegawai" style="width:75  %"> 
            <?php
                $pgw = mysqli_query($sambung,"SELECT * from pegawai");
                while($p = mysqli_fetch_array($pgw)){
                   echo "<option value=".$p['id_pegawai'].">".$p['nama_pegawai']."</option>";
                }
            ?>
        </select>
        </div>
        <div class=edit-inv>
        <label>Petugas</label>
        <select name="petugas"> 
            <?php
                $ptg = mysqli_query($sambung,"SELECT * from petugas");
                while($pt = mysqli_fetch_array($ptg)){
                   echo "<option value=".$pt['id_petugas'].">".$pt['nama_petugas']."</option>";
                }
            ?>
        </select>
        </div>
        <div class=edit-inv>
        <input type="number" name="jp" placeholder=jumlah required>
        </div>
        <input type="submit" value="SUBMIT" class="btn">
        </center>
    </form>
    </div>
</body>
</html>