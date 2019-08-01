<?php 
require_once "prosses/connect.php";
include "prosses/validasi.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script src="assets/js/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="assets/css/home.css">
    <title>Document</title>
</head>
<body>

    <div class="nav" id="nav">
        <div class="lnav">
        <a href="home.php#hl" > <span style="color:rgb(223, 98, 98)">TELKOM </span><span style="color:white">SCHOOL </span><span style="color:rgb(133, 220, 255)" class="cl">INVENTARIS</span></a>
        <a href="prosses/logout.php" style="float:right;margin-right:100px;color:white">Logout</a>
        <a href="home.php#li" style="float:right;margin-right:50px;color:white;font-size:15px">List Inventaris</a>
        <a href="home.php#lp" style="float:right;margin-right:50px;color:white;font-size:15px">List Peminjaman</a>
        <a href="home.php#lw" style="float:right;margin-right:50px;color:white;font-size:15px">List Pegawai</a>
        
        </div>
    </div>
    
    
    <div class="head-listbarang" id="hl">
        <div>
           <center><h1 style="font-size:10vw;text-shadow: 5px 2px 1px #000000;">INVENTARIS</h1></center>
        </div>
    </div>
    

    <div class="bodyy">


    <div class="con"><a href="peminjaman.php" class="btn" >PINJAMKAN BARANG</a></div>
        <h1 id="li">LIST INVENTARIS</h1>
        <table cellpadding="0" cellspacing="0" border="0">
        <tr class="tbl-header"><th>NO</th><th>NAMA</th><th>DESKRIPSI</th><th>JUMLAH</th><th>JENIS</th><th>TANGGAL REGISTRASI</th><th>STOK TERSEDIA</th><th>EDIT</th></tr>
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
                echo "<td><a class=table-edit href='edit.php?id=".$d['id_inventaris']."'>EDIT<a><a class=table-delete href='prosses/delete.php?id=".$d['id_inventaris']."'>DELETE<a></td>";
                $h++;
            }
        ?>
        </table>
        <a href="add.php"><div class="btnb"> <center> <h1> Tambah Inventaris </h1> </center>   </div></a>
        <a href="jenis.php" ><div class="btnb"> <center> <h1> Tambah Jenis </h1> </center>   </div></a>
        <h1 id="lp">LIST PEMINJAM</h1>
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
                echo "<td><a class=table-kembali href='prosses/kembali.php?id=".$d['id_peminjaman']."' >kembali</a></td>";
            }else{
                echo "<td><span class='kbl'>Telah Kembali</spam></td>";
            }
                    $h++;
            }
        ?>
        </table>
        <h1 id="lw">LIST PEGAWAI</h1>
        <table cellpadding="0" cellspacing="0" border="0">
        <tr class="tbl-header"><th>NO</th><th>NAMA</th><th>TELEPON</th><th>ALAMAT</th><th>EDIT</th></tr>
        <?php
            $h=1;
            $inv = mysqli_query($sambung,"SELECT * from pegawai");
            while($d = mysqli_fetch_array($inv)){
                echo "<tr class='tbl-content'>";
                echo "<td>".$h."</td>";
                echo "<td>".$d['nama_pegawai']."</td>";
                echo "<td>".$d['telp']."</td>";
                echo "<td>".$d['alamat']."</td>";
                echo "<td><a class=table-edit href='editpegawai.php?id=".$d['id_pegawai']."'>EDIT<a><a class=table-delete href='prosses/deletepegawai.php?id=".$d['id_pegawai']."'>DELETE<a></td>";
                $h++;
            }
        ?>
        </table>
        <a href="daftarpegawai.php" ><div class="btnb"> <center> <h1> Tambah Pegawai </h1> </center>   </div></a>
        <a href="print.php" ><div class="btnb-b"> <center> <h1> PRINT </h1> </center>   </div></a>
        
    </div>

</body>
</html>
<script>
$(document).ready(function(){
  $(window).scroll(function(){
  	var scroll = $(window).scrollTop();
	  if (scroll > 300) {
	    $(".nav").css("background" , "rgba(48, 48, 48, 0.575)");
        $(".cl").css("color" , "black");
	  
      }

	  else{
		  $(".nav").css("background" , "rgb(63, 63, 63)"); 
          $(".cl").css("color" , "rgb(133, 220, 255)"); 	
	  }
      if(scroll>$('.bodyy').scroll.Top){
          alert("TES")
      }
  })
})
</script>
