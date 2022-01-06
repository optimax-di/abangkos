<?php
include('cek-sesiadmin.php');
include ('../control/connection.php');
include ('../control/rumahkos.php');;

$id = $_SESSION['id_hakakses'];
$res = tampilprofileadmin($id);
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin abangKOS | Manage Profil</title>
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
        <li><a href="dataadmin.php"><i class="fa fa-user"></i> <span>Profil Admin</span></a></li>
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

  <div class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
        <li class=""><i class="fa fa-home"></i> <a href="adminhome.php"> Beranda</a></li>
        <li class="active"><i class="fa fa-user"></i> Profile</li>
      </ol>
        <div class="row">
        <div class="col-md-12">
       <p class="well lead">Admin Profil | Admin <a href="index.php">RumahKOS</a></p>
    </section>
    <br><br>
    <!-- Main content -->

<div class="container">
  <div class="row">
    <?php while($row = mysqli_fetch_assoc($res)): ?>
      <div class="col-lg-12 thumb">      
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="well well-sm">
            <div class="row">
              <div class="col-sm-6 col-md-4">
                  <img src="https://placeimg.com/380/500/arch" alt="Gambar tidak tersedia" class="img-rounded img-responsive" />
              </div>
                    <div class="col-sm-6 col-md-8">
                        <h4><span class="label label-success"><?php echo $row['id_user'] ?></span> <b><?php echo $row['nama'] ?></b></h4>
                        <cite title="tempat-badiam"> <?php echo $row['alamat'] ?><i class="glyphicon glyphicon-map-marker"></i></cite>
                    <p>
                        <i class="glyphicon glyphicon-user"> <?php echo $row['namalengkap'] ?></i>
                        <br />                    
                        <i class="glyphicon glyphicon-envelope"> <?php echo $row['email'] ?></i>
                        <br />
                        <i class="glyphicon glyphicon-phone"></i> <?php echo $row['hp'] ?></a>
                    </p>
            <br>
      <small><a class="btn-xs btn-info" href="editdataadmin.php?id_user=<?php echo $row['id_user']; ?>"><i class="fa fa-edit"></i>Edit Profil</a></small>
                </div>
              </div>
            </div>
          </div>
        <hr>
      </div>
    <?php endwhile; ?>
  </div>
</div>

</div>

<center><footer class="main-footer">
<strong><a href="#">abangKOS </a>&copy;2017 | Cara Mudah Cari Kos </strong>
</footer></center>
<div class="control-sidebar-bg"></div>
</div>

<script src="../plugins/jQuery/jQuery-2.2.0.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/js/app.min.js"></script>

</body>
</html>
