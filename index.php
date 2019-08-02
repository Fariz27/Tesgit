<?php
session_start();
if(isset($_SESSION['akun'])){
    header('location:home.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Inventarisir</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
    <div> <center>
            <div  class="loginbox">
                <div>
                <img src="assets/image/logo-ts.png" width="100vw">
                <h2>TELKOM SCHOOL</h2>
                <h3>INVENTARIS</h3>
                </div>
                <div>
                    <?php
                    if(isset($_GET['salah'])){
                    echo "<span style='color:red'>".($_GET['salah'])."</span>";
                }
                    ?>
                    <form action="prosses/login.php" method="post">
                    <div class="inputbox">
                     <img class="icon" width="40vw" src="assets/image/ulogin.png" alt="">       
                     <input name="un" type="text" class="inputlog" placeholder="Masukan Username" required ><br>
                    </div><div class="inputbox">
                    <input require name="pw" type="password" class="inputlog" placeholder="Masukan Password" required ><br>
                    </div>
                    <input type="submit" value="LOGIN" class="button">
                    </form>
                </div>
                <div style="clear:both"></div>
            </div></center>    
        </div>
</body>
</html>