<?php 
require_once "prosses/connect.php";
include "prosses/validasi.php"; 
?>
<!DOCTYPE html>
<html>
<head>
    <title>PRINT LAPORAN INVENTARIS</title>
    <link rel="stylesheet" href="assets/css/home.css">
</head>
<body>

	<center>
		<h2>LAPORAN INVENTARIS TELKOM SCHOOL</h2>
		<h4>By Fariz Akbar Ade Rian (16) XRPL3</h4>
	</center>

	<br/>

    <div class="bodyy">

        <h1>LIST INVENTARIS</h1>
        <table cellpadding="0" cellspacing="0" border="0">
        <tr class="tbl-header"><th>NO</th><th>NAMA</th><th>DESKRIPSI</th><th>JUMLAH</th><th>JENIS</th><th>TANGGAL REGISTRASI</th><th>STOK TERSEDIA</th></tr>
        <?php
            $h=1;
            $inv = mysqli_query($sambung,"SELECT * from inventaris");
            while($d = mysqli_fetch_array($inv)){
                echo "<tr class='tbl-content'>";
                echo "<td>".$h."</td>";
                echo "<td>".$d['nama']."</td>";
                echo "<td>".$d['deskripsi']."</td>";
                echo "<td>".$d['jumlah']."</td>";
                echo "<td>".$d['id_jenis']."</td>";
                echo "<td>".$d['tgl_registrasi']."</td>";
                echo "<td>".$d['stok_tersedia']."</td>";
                $h++;
            }
        ?>
        </table>
       
        <h1>LIST PEMINJAM</h1>
        <table cellpadding="0" cellspacing="0" border="0">
        <tr class="tbl-header"><th>NO</th><th>ID PEMINJAMAN</th><TH>ID INVENTARIS</TH><TH>ID PEGAWAI</TH><TH>TANGGAL PINJAM</TH><TH>TANGGAL KEMBALI</TH><TH>STATUS</TH><TH>ID PETUGAS</TH><TH>JUMLAH PINJAM</TH><TH>PENGEMBALIAN</TH></tr>
        <?php
            $h=1;
            $pm = mysqli_query($sambung,"SELECT * FROM peminjaman");
            while($d = mysqli_fetch_array($pm)){
                echo "<tr class='tbl-content'>";
                echo "<td>".$h."</td>";
                echo "<td>".$d['id_peminjaman']."</td>";
                echo "<td>".$d['id_inventaris']."</td>";
                echo "<td>".$d['id_pegawai']."</td>";
                echo "<td>".$d['tgl_pinjam']."</td>";
                echo "<td>".$d['tgl_kembali']."</td>";
                echo "<td>".$d['status']."</td>";
                echo "<td>".$d['id_petugas']."</td>";
                echo "<td>".$d['jumlah_pinjam']."</td>";
                if($d['status']!='kembali'){

            }else{
                echo "<td><span class='kbl'>Telah Kembali</spam></td>";
            }
                    $h++;
            }
        ?>
        </table>
        <h1>LIST PEGAWAI</h1>
        <table cellpadding="0" cellspacing="0" border="0">
        <tr class="tbl-header"><th>NO</th><th>NAMA</th><th>TELEPON</th><th>ALAMAT</th></tr>
        <?php
            $h=1;
            $inv = mysqli_query($sambung,"SELECT * from pegawai");
            while($d = mysqli_fetch_array($inv)){
                echo "<tr class='tbl-content'>";
                echo "<td>".$h."</td>";
                echo "<td>".$d['nama_pegawai']."</td>";
                echo "<td>".$d['telp']."</td>";
                echo "<td>".$d['alamat']."</td>";
                
                $h++;
            }
        ?>
        </table>

    </div>
	
	<script>
		window.print();
	</script>
	
</body>
</html>