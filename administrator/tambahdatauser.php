<?php
include('cekloginadmin.php');
include('cek-sesiadmin.php');
include ('../control/connection.php');
include ('../control/rumahkos.php');

if(isset($_POST['submit'])){
  $namalengkap  = $_POST['namalengkap'];
  $nama         = $_POST['nama'];
  $password     = $_POST['password'];
  $email        = $_POST['email'];
  $alamat       = $_POST['alamat'];
  $hp           = $_POST['hp'];
  $idhakuser = 2;

  if(empty($namalengkap) || empty($nama) || empty($password) || empty($email) || empty($alamat) || empty($hp)){
      ?> <script type="text/javascript">alert('Mohon diisi semua fieldnya')</script> <?php
  }else{
    if(daftaruser($namalengkap, $nama, $password, $email, $alamat, $hp, $idhakuser)){
      header('location: datauser.php');
    }else{
      echo "<h2>There is Something Wrong Om...</h2>";
    }
  }
}

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin abangKOS | Manage Data User</title>
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
          <img src="dist/admin.png" class="img-circle" alt="User Image">
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
        <li class="active"><a href="datauser.php"><i class="fa fa-database"></i> <span>Data User</span></a></li>
        <li><a href="dataadmin.php"><i class="fa fa-folder-open-o"></i> <span>Data Admin</span></a></li>
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
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <ol class="breadcrumb">
        <li class=""><i class="fa fa-home"></i> Beranda</li>
        <li class="active"><i class="fa fa-plus"> Tambah Data</i></li>
      </ol>
                          <div class="row">
              <div class="col-md-12">
              <p class="well lead">Tambah User | Admin <a href="index.php">abangKOS</a></p>
    </section>
    <br><br>
    <!-- Main content -->
    <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
                  <form class="form-horizontal" action="" method="POST">
                    <div class="box-body">

                       <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-user"></i>
                          </div>
                          <input type="text" name="namalengkap" class="form-control" placeholder="Nama Lengkap">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-user"></i>
                          </div>
                          <input type="text" name="nama" class="form-control" placeholder="Nama">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-lock"></i>
                            </div>
                              <input type="text" name="password" class="form-control" placeholder="Password">
                            </div>
                      </div>
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-envelope"></i>
                          </div>
                            <input type="text" name="email" class="form-control" placeholder="Email">
                          </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-home"></i>
                          </div>
                            <input type="text" name="alamat" class="form-control" placeholder="Alamat">
                          </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-tablet"></i>
                          </div>
                            <input type="text" name="hp" class="form-control" placeholder="Nomor Telephone">
                          </div>
                    </div>

                      <div class="pull-right">
                        <button type="reset" class="btn btn-danger">Hapus</button>
                        <input type="submit" name="submit" class="btn btn-primary" value="Tambah">
                      </div>

                  </form>
        </div>

    </section>
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
