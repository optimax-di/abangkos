<?php 
session_start();
ob_start();
include('cekloginuser.php');
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
  if(!isset($_SESSION['nama'])){
  	  ?><script>swal("Please Login", "warning"); window.location.href='usermasuk.php';</script><?php
  }elseif(!isset($_SESSION['password'])){
      ?><script>swal("Please Login", "warning"); window.location.href='usermasuk.php';</script><?php
  }elseif(!isset($_SESSION['id_user'])){
     ?><script>swal("Please Login", "warning"); window.location.href='usermasuk.php';</script><?php
  }
  ob_end_flush();
 ?>
