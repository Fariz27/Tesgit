<?php
require_once "prosses/connect.php";
$pgw = mysqli_query($sambung,"SELECT * FROM `pegawai`");
$apgw= mysqli_fetch_array($pgw);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="assets/css/form.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<center><h1>EDIT PEGAWAI</h1></center>
    <div class="box">
        <center>
    <form method="post">
        <div class="edit-inv">
        <input type="text" name="nama" placeholder="Nama Pegawai" value="<?php echo $apgw['nama_pegawai'] ?>" required>
        </div>
        <div class="edit-inv">
        <input type="text" name="telepon" placeholder="No Telepon" value="<?php echo $apgw['telp'] ?>" required>
        </div>
        <div class="edit-inv">
        <input type="text" name="alamat" placeholder="Alamat" value="<?php echo $apgw['alamat'] ?>" required>
        </div>
        <input type="submit" value="SUBMIT" class="btn">
    </form>
    </center>
    </div>
</body>
</html>
<?php
    if(isset($_POST['nama'])){
    $id=$_GET['id'];
    $nama = $_POST['nama'];
    $telepon = $_POST['telepon'];
    $alamat = $_POST['alamat'];
    mysqli_query($sambung,"UPDATE `pegawai` SET `nama_pegawai`='$nama',`telp`='$telepon',`alamat`='$alamat' WHERE `id_pegawai`= '$id'");
    header('location:home.php');
    }
?>