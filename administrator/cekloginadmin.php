<?php 
ob_start();
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
include('../control/connection.php');

if(isset($_POST['submitadmin'])){
$nama = $_POST['nama'];
$password = $_POST['password'];

if(empty($nama) || empty($password)){
  ?>
   <script>swal({title:"Field Tidak Boleh Kosong!", text:"", type:"warning"}, function(){window.location.href='index.php';});</script>
  <?php
}else{
  $query = mysqli_query($konek, "SELECT * FROM user WHERE nama = '$nama' AND password = '$password'");
  $res = mysqli_fetch_assoc($query);

  if($res['id_hakakses'] == 1){
    session_start();
    $_SESSION['nama'] = $nama;
    $_SESSION['password'] = $password;
    $_SESSION['id_hakakses'] = $res['id_hakakses'];
     header('location: adminhome.php');
  }else{
     ?> <script>swal({title:"Masukan Username / Password Dengan Benar!", text:"Cek Again!", type:"error"}, function(){window.location.href='index.php';});</script>
     <?php
  }
}
}
ob_end_flush();
 ?>