<?php
ob_start();
include ('cek-sesiuser.php');
include ('control/connection.php');
include ('control/rumahkos.php');

$id_user = $_SESSION['id_user'];
$res = tampilprofile($id_user);
// var_dump($res);
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
  </aside>


<div class="page-content inset">
  <div class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-home"></i> Beranda</li>
      </ol>
              <div class="row">
              <div class="col-md-12">
               
              <p class="well lead"><b>Edit Profil Saya | <a href="index.php">abangKOS</a></b></p>
            </div>
          </div>
    </section>

    <section class="content">
      <div class="row">
      <div class="col-md-4">

              <?php while($row=mysqli_fetch_assoc($res)): ?>
              <form class="form-horizontal" action="" method="POST">
                <div class="box-body">


                   <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-user"></i>
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
                        <i class="glyphicon glyphicon-map-marker"></i>
                      </div>
                        <input type="text" name="alamat" class="form-control" value="<?php echo $row['alamat']; ?>">
                      </div>
                    </div>
                    
                
                <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-tablet"></i>
                      </div>
                        <input type="text" name="hp" class="form-control" value="<?php echo $row['hp']; ?>">
                      </div>
                    </div>
               
                    <button type="button" class="btn btn-warning" onclick="fungsi()">Back</button>
                    <input type="submit" name="submitedit" class="btn btn-primary" value="Save">
              </form>

          <?php endwhile; ?>
        </div>
    </div>
  </section>
</form>
</div>
</div>


<center>
  <footer class="main-footer">
    <strong><a href="#">abangKOS </a>&copy;2017 | Cara Mudah Cari Kos </strong>
  </footer></center>

  <div class="control-sidebar-bg"></div>


<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/app.min.js"></script>
<script src="assets/js/demo.js"></script>

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
  $alamat = $_POST['alamat'];
  $hp = $_POST['hp'];
  
  if(editdatauser($namalengkap, $nama, $email, $alamat,  $hp, $id_user)){
    ?><script>swal({title:"Berhasil!!", text:"", type:"success"}, function(){window.location.href='userinfo.php';});</script> <?php
  }else{
    echo "Eror!";
  }
}
ob_end_flush();
 ?>