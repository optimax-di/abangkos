<?php
session_start();
include('cekloginadmin.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" type="text/css" href="../plugins/swal/sweetalert.css">
  <script type="text/javascript" src="../plugins/swal/sweetalert.min.js"></script>
</head>
<body>
</body>
</html>
<?php 
  if(!isset($_SESSION['nama'])){
     ?><script>swal("Please Login","", "warning"); window.location.href='index.php';</script><?php
  }elseif(!isset($_SESSION['id_hakakses'])){
     ?><script>swal("Anda bukan Admin","", "error"); window.history.back();</script><?php
  }
?>