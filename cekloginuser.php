<?php 
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="zacky" content="rumahkos">
    <title>abangKOS - Cara mudah cari Kost</title>
  <link rel="stylesheet" type="text/css" href="plugins/swal/sweetalert.css">
  <script type="text/javascript" src="plugins/swal/sweetalert.min.js"></script>
</head>
<body>
</body>
</html>

<?php
include('control/connection.php');

if(isset($_POST['submitlogin'])){
$nama = $_POST['nama'];
$password = $_POST['password'];

if(empty($nama) || empty($password)){
  ?>
   <script id="alertswal">swal({title:"Field Kosong!", text:"", type:"warning", showConfirmButton: false, timer: 2000}, function(){window.location.href='usermasuk.php';});</script>
  <?php
}else{
  $query = mysqli_query($konek, "SELECT * FROM user WHERE nama = '$nama' AND password = '$password'");
  $res = mysqli_fetch_assoc($query);

  if($res['id_hakakses'] == 2){
    session_start();
    $_SESSION['nama'] = $nama;
    $_SESSION['password'] = $password;
    $_SESSION['id_user'] = $res['id_user'];
    header('location: userberanda.php');
  }else{
     ?> <script id="alertswal">swal({title:"Masukan Username / Password Dengan Benar!", text:"Mohon Periksa Kembali", type:"error", showConfirmButton: false, timer: 2000}, function(){window.history.back();});</script> <?php
  }
}
}

ob_end_flush();
 ?>