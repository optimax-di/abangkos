<?php
session_start();
include ('control/connection.php');
include ('control/rumahkos.php');;
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="zacky" content="rumahkos">
    <title>abangKOS - Cara mudah cari Kost</title>
    <link rel="icon" href="assets/img/abangko.png">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="assets/js/jquery.js"></script>
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="plugins/swal/sweetalert.css">
    <script type="text/javascript" src="plugins/swal/sweetalert.min.js"></script>

    <style type="text/css">
    body{
      background-image: url("assets/img/x.jpg");}
    html,body{
      position: relative;
      height: 100%;}
    </style>

  </head>
  <body><br>
    <header class="masthead text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h1 class="text-uppercase">
              <strong>User Registration</strong>
            </h1>
            <hr>
          </div>
          <div class="col-lg-4 mx-auto">

             <form class="form-horizontal" action="" method="POST">
                <div class="box-body">


                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                      </div>
                      <input type="text" name="namalengkap" class="form-control" placeholder="Nama Lengkap Anda">
                    </div>
                  </div>

  
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                      </div>
                      <input type="text" name="nama" class="form-control" placeholder="Username Anda">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-lock"></i>
                        </div>
                          <input type="text" name="password" class="form-control" placeholder="Kata Sandi">
                        </div>
                  </div>
                <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-envelope"></i>
                      </div>
                        <input type="email" name="email" class="form-control" placeholder="Example : namaanda@domain.com">
                      </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-home"></i>
                      </div>
                        <input type="text" name="alamat" class="form-control" placeholder="Masukan Alamat">
                      </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-tablet"></i>
                      </div>
                        <input type="text" name="hp" class="form-control" placeholder="Nomor HP">
                      </div>
                </div>
                <div class="box-footer">
                  <div class="pull-right">
                    <button type="button" class="btn btn-primary" onclick="window.location.href='usermasuk.php';">Back</button>
                    <input type="submit" name="submit" class="btn btn-success" value="Daftar">
                  </div>
                </div>
              </form>
          </div>
        </div>
      </div>
    </header>
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
<?php 
if(isset($_POST['submit'])){
  $namalengkap = filterinput($_POST['namalengkap']);
  $nama = filterinput($_POST['nama']);
  $password = filterinput($_POST['password']);
  $email = filterinput($_POST['email']);
  $alamat = filterinput($_POST['alamat']);
  $hp = filterinput($_POST['hp']);
  $idhakuser = 2;
  if(empty($namalengkap) || empty($nama) || empty($password) || empty($email) || empty($alamat) || empty($hp)){
      ?> <script type="text/javascript">swal('Mohon diisi semua fieldnya',"","warning");</script> <?php
  }else{
    if(daftaruser($namalengkap, $nama, $password, $email, $alamat, $hp, $idhakuser)){
      $_SESSION['nama'] = $nama;
      $_SESSION['password'] = $password;
      $_SESSION['id_user'] = $idhakuser;
      ?> <script type="text/javascript">swal({title:"Sukses! Silahkan login dengan Akun Anda", text:"", type:"success"}, function(){window.location.href='usermasuk.php';});</script> <?php
    }else{
      echo "<h2>Ada Kesalahan...</h2>";
    }
  }
}

?>