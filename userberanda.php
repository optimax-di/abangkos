<?php
include ('cek-sesiuser.php');
include ('control/connection.php');
include ('control/rumahkos.php');
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>abangKOS - User Home</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="icon" href="assets/img/abangko.png">

</head>

<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <a href="userberanda.php" class="logo">
      <span class="logo-mini"><b>a</b>K</span>
      <span class="logo-lg"><b>abang</b> KOS</span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="">
               <a href="#" class="disabled" data-toggle="dropdown">
                 <span class="">Selamat Datang &nbsp;<?php echo $_SESSION['nama']; ?></span>
               </a>
             </li>
           </ul>
      </div>
    </nav>
  </header>

  <aside class="main-sidebar">
    <section class="sidebar">

      <ul class="sidebar-menu">
        <li class="header">Option</li>
        <li class="active"><a href="userberanda.php"><i class="fa fa-user"></i> <span>Beranda User</span></a></li>
        <li class="active"><a href="index.php"><i class="fa fa-home"></i> <span>Beranda Utama</span></a></li>
        <li class="active"><a href="userinfo.php"><i class="fa fa-user-secret"></i> <span>Profil</span></a></li>
        <li class="active"><a href="usertambahkos.php"><i class="fa fa-hotel"></i> <span>Tambah KOS</span></a></li>
        <li class="active"><a href="userpunyakos.php"><i class="fa fa-building"></i> <span>Lihat Kos</span></a></li>
        <li class="active"><a href="galleryfoto.php"><i class="fa fa-image"></i> <span>Tambah Foto</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-gear"></i> <span>Setting</span> <i class="fa fa-angle-left pull-left"></i></a>
          <ul class="treeview-menu">
            <li><a href="usercengpass.php"><i class="fa fa-lock"></i>Ganti Password</a></li>
            <li><a href="userkeluar.php"><i class="fa fa-sign-out"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </section>
  </aside>

<div class="page-content inset">
  
  <div class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="userberanda.php" class="active"><i class="fa fa-home"></i> Beranda</li>
      </ol>
              <div class="row">
              <div class="col-md-12">
                <center>
              <p class="well lead"><b>User Page | <a href="index.php">abangKOS</a></b></p></center>
    </section>
<!-- ini lah isi beranda kita waaayy -->
<!-- ini lah isi beranda kita waaayy -->
    <section class="content">
       <p class="lead">
         <b>Selamat Datang</b> <?php echo $_SESSION['nama']; ?>, Terimakasih telah bergabung bersama kami di <a href="index.php">abangKOS</a>. Daftarkan Kos & Kontrakan kamu disini, untuk promosi kos-kosan milikmu dan membantu user lain dalam menemukan kos idaman mereka. Klik <a href="usertambahkos.php">Tambah Kos</a> untuk mendaftarkan kosan kamu.
         <br>Have a nice day <?php echo $_SESSION['nama']; ?>.</p>
    </section>
<!-- ini lah isi beranda kita waaayy -->
<!-- ini lah isi beranda kita waaayy -->

  </div>
</div>

<center>
  <footer class="main-footer">
    <strong><a href="#">abangKOS </a>&copy;2017 | Cara Mudah Cari Kos </strong>
  </footer></center>

  <div class="control-sidebar-bg"></div>
</div>

<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/app.min.js"></script>

</body>
</html>
