<?php
include('cek-sesiadmin.php');
include ('../control/connection.php');
include ('../control/rumahkos.php');;

if(isset($_POST['submit'])){
  $nama = $_POST['nama'];
  $passlama = $_POST['passwordlama'];
  $passbaru = $_POST['passwordbaru'];

  if(empty($nama) || empty($passlama) || empty($passbaru)){
      ?> <script type="text/javascript">alert('Mohon diisi semua fieldnya / username dan password anda salah')</script> <?php
  }else{
    $cek = "SELECT * FROM admin WHERE nama = '$nama' AND password = '$passlama'";
    $queryres = mysqli_query($konek, $cek);

    $count=mysqli_num_rows($queryres);

    if($count >= 1){
      $updatepass = "UPDATE admin SET password ='$passbaru' WHERE nama = '$nama'";
      $updatequery = mysqli_query($konek, $updatepass);

      if($updatequery){
        ?>
         <script>alert("Password Anda Berhasil di Ubah");</script>
        <?php
      }else{
        echo "Maaf ada kesalahan";
      }
    }
  }
}

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin abangKOS - Password Setting</title>
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
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li class=""><i class="fa fa-home"></i> Beranda</li>
        <li class="active"><i class="fa fa-edit"> Ganti Password</i></li>
      </ol>
      <div class="row">
              <div class="col-md-12">
              <p class="well lead">Ganti Password | Admin <a href="index.php">abangKOS</a>
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
                          <input type="text" name="nama" class="form-control" placeholder="Username Anda">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-unlock"></i>
                            </div>
                              <input type="text" name="passwordlama" class="form-control" placeholder="Password Lama Anda">
                            </div>
                      </div>
                      <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-lock"></i>
                          </div>
                            <input type="text" name="passwordbaru" class="form-control" placeholder="Password Baru Anda">
                          </div>
                        </div>

                      <div class="pull-right">
                        <button type="reset" class="btn btn-success">Cancel</button>
                        <input type="submit" name="submit" class="btn btn-primary" value="Ganti">
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
