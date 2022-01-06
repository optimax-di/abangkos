<?php
include('cek-sesiadmin.php');
include ('../control/connection.php');
include ('../control/rumahkos.php');;
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin abangKOS - Home</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
  <link rel="icon" href="../dist/rumahkos.ico">
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  
</head>

<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <a href="adminhome.php" class="logo">
      <span class="logo-mini"><b>a</b>K</span>
      <span class="logo-lg"><b>abang</b> KOS</span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         </ul>
      </div>
    </nav>
  </header>

  <aside class="main-sidebar">
    <section class="sidebar">

      <div class="user-panel">
      <div class="pull-left image">
          <img src="../dist/admin.png" class="img-circle" alt="User Image">
        </div
        </div>
        <div class="pull-left info">
          <p> <?php echo $_SESSION['nama']; ?> </p>
          <a href="#"><i class="fa fa-circle text-success"></i> Aktif</a>
        </div>
      </div>

      <ul class="sidebar-menu">
        <li class="header">Option</li>
        <li class="active"><a href="adminhome.php"><i class="fa fa-home"></i> <span>Home</span></a></li>
        <li class="active"><a href="datakos.php"><i class="fa fa-hotel"></i> <span>Data Kos</span></a></li>
        <li class="active"><a href="datauser.php"><i class="fa fa-users"></i> <span>Data User</span></a></li>
        <li><a href="dataadmin.php"><i class="fa fa-user"></i> <span>Data Admin</span></a></li>
        <li class="treeview">

        <a href="#"><i class="fa fa-gear"></i> <span>Setting</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
            <li><a href="gantipassadmin.php"><i class="fa fa-lock"></i>Ganti Password</a></li>
            <li><a href="adminlogout.php"><i class="fa fa-sign-out"></i> Keluar</a></li>
          </ul>
        </li>
      </ul>
    </section>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
  <section class="content-header">
    <h1>
      <i class="fa fa-home icon-title"></i> Beranda
    </h1>
    <ol class="breadcrumb">
      <li><a href="adminhome.php"><i class="fa fa-home"></i> Beranda</a></li>
    </ol>
  </section>


 <section class="content">
    <div class="row">
      <div class="col-lg-12 col-xs-12">
        <div class="alert alert-info alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <p style="font-size:15px">
            <i class="icon fa fa-user"></i> Selamat datang <strong><?php echo $_SESSION['nama']; ?></strong> di Abangkos.
          </p>        
        </div>
      </div>
    </div>
   
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div style="background-color:#00c0ef;color:#fff" class="small-box">
          <div class="inner">
            <?php  
            // fungsi query untuk menampilkan data dari tabel obat
            $query = mysqli_query($konek, "SELECT COUNT(idkos) as jumlah FROM listkos")
                                            or die('Ada kesalahan pada query tampil Data Obat: '.mysqli_error($konek));

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jumlah']; ?></h3>
            <p>Kos-Kosan</p>
          </div>
          <div class="icon">
            <i class="fa fa-hotel"></i>
          </div>
          <?php  
          if ($_SESSION['nama']!='1') { ?>
            <a href="datakos.php" class="small-box-footer" title="Lihat Data Kos" data-toggle="tooltip"><i class="fa fa-hotel"></i></a>
          <?php
          } else { ?>
            <a class="small-box-footer"><i class="fa"></i></a>
          <?php
          }
          ?>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div style="background-color:#00a65a;color:#fff" class="small-box">
          <div class="inner">
            <?php   
            // fungsi query untuk menampilkan data dari tabel obat masuk
            $query = mysqli_query($konek, "SELECT COUNT(id_user) as jumlah FROM user")
                                            or die('Ada kesalahan pada query tampil Data obat Masuk: '.mysqli_error($konek));

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jumlah']; ?></h3>
            <p>Data User</p>
          </div>
          <div class="icon">
            <i class="fa fa-users"></i>
          </div>
          <?php  
          if ($_SESSION['nama']!='1') { ?>
            <a href="datauser.php" class="small-box-footer" title="Lihat Data User" data-toggle="tooltip"><i class="fa fa-users"></i></a>
          <?php
          } else { ?>
            <a class="small-box-footer"><i class="fa"></i></a>
          <?php
          }
          ?>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div style="background-color:#f39c12;color:#fff" class="small-box">
          <div class="inner">
            <?php  
            // fungsi query untuk menampilkan data dari tabel obat
            $query = mysqli_query($konek, "SELECT COUNT(idkomen) as jumlah FROM komentar")
                                            or die('Ada kesalahan pada query tampil Data Obat: '.mysqli_error($konek));

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jumlah']; ?></h3>
            <p>Komentar Pengguna</p>
          </div>
          <div class="icon">
            <i class="fa fa-twitch"></i>
          </div>
          <a href="#" class="small-box-footer" title="Komentar Pengguna Kos" data-toggle="tooltip"><i class="fa fa-twitch"></i></a>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div style="background-color:#dd4b39;color:#fff" class="small-box">
          <div class="inner">
            <?php   
            // fungsi query untuk menampilkan data dari tabel obat masuk
            $query = mysqli_query($konek, "SELECT COUNT(id) as jumlah FROM rating")
                                            or die('Ada kesalahan pada query tampil Data obat Masuk: '.mysqli_error($konek));

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jumlah']; ?></h3>
            <p>Total di Rating</p>
          </div>
          <div class="icon">
            <i class="fa fa-star"></i>
          </div>
          <a href="#" class="small-box-footer" title="Total Rating" data-toggle="tooltip"><i class="fa fa-star"></i></a>
        </div>
      </div><!-- ./col -->
    </div><!-- /.row -->
  </section><!-- /.content -->

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <center>
  <footer class="main-footer">
    <strong><a href="#">abangKOS </a>&copy;2017 | Cara Mudah Cari Kos </strong>
  </footer></center>



  <div class="control-sidebar-bg"></div>
</div>

<script src="../plugins/jQuery/jQuery-2.2.0.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/js/app.min.js"></script>

</body>
</html>
