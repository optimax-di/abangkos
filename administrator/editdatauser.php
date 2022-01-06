<?php
include('cekloginadmin.php');
include('cek-sesiadmin.php');
include ('../control/connection.php');
include ('../control/rumahkos.php');

$id_user = $_GET['id_user'];
$tampil = tampilperid($id_user);

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin abangKOS - Manage Data User</title>
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



  <div class="content-wrapper">

    <section class="content-header">

      <ol class="breadcrumb">
        <li class=""><i class="fa fa-home"></i> Beranda</li>
        <li class="active"><i class="fa fa-edit"> Edit Data</i></li>
      </ol>
                                <div class="row">
              <div class="col-md-12">
              <p class="well lead">Admin Manage Useer | Admin <a href="index.php">abangKOS</a>
    </section>
    <br><br>
    <!-- isi konten -->
    <?php while($res = mysqli_fetch_assoc($tampil)){  ?>
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
                          <input type="text" name="namalengkap" class="form-control" placeholder="Nama Lengkap" value="<?php echo $res['namalengkap']; ?>">
                        </div>
                      </div>
                      
 
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-user"></i>
                          </div>
                          <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo $res['nama']; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-lock"></i>
                            </div>
                              <input type="text" name="password" class="form-control" placeholder="Password" value="<?php echo $res['password']; ?>">
                            </div>
                      </div>
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-envelope"></i>
                          </div>
                            <input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo $res['email']; ?>">
                          </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-home"></i>
                          </div>
                            <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?php echo $res['alamat']; ?>">
                          </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-tablet"></i>
                          </div>
                            <input type="text" name="hp" class="form-control" placeholder="Nomor Hape" value="<?php echo $res['hp']; ?>">
                          </div>
                    </div>

                      <div class="pull-right">

                        <a href="datauser.php" class="btn btn-warning">Kembali</a>
                        <input type="submit" name="submit" class="btn btn-primary" value="Edit">
                      </div>
                  </form>
        </div>
    </section>
  </div>
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
<?php } ?>


<?php
  if(isset($_POST['submit'])){
    if(editdatauser($_POST['namalengkap'], $_POST['nama'], $_POST['password'], $_POST['email'], $_POST['alamat'], $_POST['hp'], $_GET['id_user'])){
    ?><script>swal("Data Berhasil di Edit", "", "success"); window.location.href='datauser.php';</script><?php
    }else{
      echo "Gagal!";
    }

  }

 ?>
