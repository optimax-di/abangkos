<?php
include ('cek-sesiuser.php');
include ('control/connection.php');
include ('control/rumahkos.php');

$id = $_SESSION['nama'];
$res = tampilprofile($id);

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
        <li class="treeview">
          <a href="#"><i class="fa fa-gear"></i> <span>Setting</span> <i class="fa fa-angle-left pull-left"></i></a>
          <ul class="treeview-menu">
            <li><a href="usercengpass.php"><i class="fa fa-lock"></i>Ganti Password</a></li>
            <li><a href="userkeluar.php"><i class="fa fa-sign-out"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </section>
  </aside>>


<div class="page-content inset">
  <div class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
        <li class=""><i class="fa fa-home"></i> <a href="userberanda.php"> Home</a></li>
        <li class="active"><i class="fa fa-user"></i> Profil Saya</li>
      </ol>
              <div class="row">
              <div class="col-md-12">
              <p class="well lead">Profil Saya | <a href="index.php">abangKOS</a></p>
    </section>
    <!-- Main content -->

       <div class="container">
          <div class="row">
            <?php while($row = mysqli_fetch_assoc($res)): ?>
              <div class="col-lg-12 thumb">
              <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="well well-sm">
              <div class="row">
              <div class="col-sm-6 col-md-4">

                        <img src="https://placeimg.com/380/500/arch" alt="Gambar tidak tersedia" class="img-rounded img-responsive" /> <!-- nnti akan di ganti dengan foto profil user -->

              </div>
              <div class="col-sm-6 col-md-8">
                        <h4><span class="label label-success"><?php echo $row['id_user'] ?></span>
                        <b><?php echo $row['nama'] ?></b></h4>
                        <cite title="tempat-badiam"> <?php echo $row['alamat'] ?><i class="glyphicon glyphicon-map-marker"></i></cite>
                    <p>
                        <i class="glyphicon glyphicon-user"> <?php echo $row['namalengkap'] ?></i>
                        <br />                    
                        <i class="glyphicon glyphicon-envelope"> <?php echo $row['email'] ?></i>
                        <br />
                        <i class="glyphicon glyphicon-phone"></i> <?php echo $row['hp'] ?></a>
                    </p><br> <br><hr>

                    <small><a class="btn-xs btn-info" href="useredit.php?id_user=<?php echo $row['id_user']?>"><i class="fa fa-edit"></i>Edit Profil</a></small>

                     </div>
                   </div>
                 </div>
               </div>
              </div>            
      <?php endwhile; ?>
      </div>
    </div>
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
