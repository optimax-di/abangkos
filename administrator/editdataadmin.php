<?php
ob_start();
include('cek-sesiadmin.php');
include ('cekloginadmin.php');
include ('../control/connection.php');
include ('../control/rumahkos.php');;

$id =  $_SESSION['id_hakakses'];
$res = tampilprofileadmin($id);
// var_dump($res);
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin abangKOS | Manage Data Admin</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
  <link rel="icon" href="../dist/rumahkos.ico">
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

  <link rel="stylesheet" type="text/css" href="../plugins/swal/sweetalert.css">
  <script type="text/javascript" src="../plugins/swal/sweetalert.min.js"></script>

  <style media="screen">
    .col-md-offset-3{
      margin-top: 120px;
    }
    .box-info{
      padding: 30px;
    }
    div.box-body{
      width: 500px;
    }

    @media screen and (max-width: 1200px){
      div.box-body{
        width: 100%;
      }
    }
  </style>
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
        <li class="active"><a href="adminhome.php"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
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
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-home"></i> Beranda</li>
      </ol>
          <div class="row">
            <div class="col-md-12">
              <p class="well lead">Admin Home | Admin <a href="index.php">RumahKOS</a>
              </p>


    <br><br>
    <!-- Main content -->

    <?php while($row=mysqli_fetch_assoc($res)): ?>
     <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
              <form class="form-horizontal" action="" method="POST">
                <div class="box-body">
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-users"></i>
                      </div>

                      <input type="text" name="namalengkap" class="form-control" value="<?php echo $row['namalengkap']; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                      </div>
                      <input type="text" name="nama" class="form-control" value="<?php echo $row['nama']; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-envelope"></i>
                      </div>
                        <input type="text" name="email" class="form-control" value="<?php echo $row['email']; ?>">
                      </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-phone"></i>
                        </div>
                          <input type="text" name="hp" class="form-control" value="<?php echo $row['hp']; ?>">
                        </div>
                  </div>
                  <div class="form-group">
                  <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-map-marker"></i>
                        </div>
                          <input type="text" name="alamat" class="form-control" value="<?php echo $row['alamat']; ?>">
                        </div>
                  </div>
                  <div class="pull-right">
                    <button type="button" class="btn btn-warning" onclick="fungsi()">Kembali</button>
                    <input type="submit" name="submitedit" class="btn btn-primary" value="Simpan">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
    <?php endwhile; ?>

</div>
</div>
</div>


    <!-- Main Footer -->
  <center>
  <footer class="main-footer">
    <strong><a href="#">abangKOS </a>&copy;2017 | Cara Mudah Cari Kos </strong>
  </footer></center>
  <div class="control-sidebar-bg"></div>

<script src="../plugins/jQuery/jQuery-2.2.0.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../plugins/fastclick/fastclick.js"></script>
<script src="../assets/js/app.min.js"></script>

</body>
</html>


<script type="text/javascript">
  function fungsi(){
    window.history.back();
  }
</script>
<?php 
if(isset($_POST['submitedit'])){
  $namalengkap = $_POST['namalengkap'];
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $hp = $_POST['hp'];
  $alamat = $_POST['alamat'];

  if(editdataadmin($namalengkap, $nama, $email, $hp, $alamat, $id)){
  	?> <script>swal({title:"Data Berhasil Di Edit", type:"success"}, function(){window.location.href='dataadmin.php';});</script></script> <?php
  }else{
  	echo "Sorry, ada yang salah itu";
  }
}
ob_end_flush();
 ?>