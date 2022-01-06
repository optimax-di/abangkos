<?php
include ('cek-sesiuser.php');
include ('control/connection.php');
include ('control/rumahkos.php');
$id = $_SESSION['id_user'];
// var_dump($id);
$tampil = infokos_perid($id);
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>abangKOS - Kos Saya</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="icon" href="assets/img/abangko.png">
  
  <link rel="stylesheet" type="text/css" href="plugins/swal/sweetalert.css">
  <script type="text/javascript" src="plugins/swal/sweetalert.min.js"></script>

</head>
<style>
  @media
    only screen and (max-width: 767px),
    (min-device-width: 768px) and (max-device-width: 1024px)  {
        .table-responsive > .table > tbody > tr > td {
            white-space: inherit;
        }
     }
</style>


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
        <li class=""><i class="fa fa-home"></i> <a href="userberanda.php"> Home</a></li>
        <li class="active"><i class="fa fa-user"></i> Profil Saya</li>
      </ol>
              <div class="row">
              <div class="col-md-12">
              <p class="well lead">Daftar Kos Saya | <a href="index.php">abangKOS</a></p>
    </section>
    <!-- Main content -->

  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="table-responsive">
            <table class="table table-hover">
              <tr>
                <th>ID</th>
                <th>Gambar</th>
                <th>Pemilik</th>
                <th>Nama Kos</th>
                <th>HP</th>
                <th>Alamat</th>
                <th>Harga</th>
                <th>Size</th>
                <th>Jumlah</th>
                <th>Sisa</th>
                <th>Kategori</th>
                <th>Akses Kos</th>
                <th>Deskripsi</th>
              </tr>

            <?php while($row = mysqli_fetch_assoc($tampil)): ?>
              <tr>
                <td><?php echo $row['idkos'] ?></td>
                <td><img src="dist/images/<?php echo $row['gambar'] ?>" width="100" height="100" alt="Load Failed" /></td>
                <td><?php echo $row['namapemilik'] ?></td>
                <td><?php echo $row['namakos'] ?></td>
                <td><?php echo $row['hp'] ?></td>
                <td><?php echo $row['address'] ?></td>
                <td><?php echo $row['harga'] ?> / <?php echo $row['pembayaran'] ?></td>
                <td><?php echo $row['ukuran'] ?></td>
                <td><?php echo $row['jumkam'] ?></td>
                <td><?php echo $row['tersedia'] ?></td>
                <td><?php echo $row['kategori'] ?></td>
                <td><?php echo $row['akses'] ?></td>
                <td><?php echo $row['deskripsi'] ?></td>
                

                <td><a class="btn btn-info btn-xs" href="usereditkos.php?idkos=<?php echo $row['idkos']; ?>"><span class="fa fa-pencil "></span></a> 
                &nbsp;<a class="btn btn-danger btn-xs deletelink" href="userdelkos.php?idkos=<?php echo $row['idkos']; ?>"><span class="fa fa-trash "></span></a></td>

              </tr>
            <?php endwhile; ?>
            </table>
            </div>
            </div>
    </section>
  </div>




<center>
  <footer class="main-footer">
    <strong><a href="#">abangKOS </a>&copy;2017 | Cara Mudah Cari Kos </strong>
  </footer></center>
</div>

  <div class="control-sidebar-bg"></div>
</div>

<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/app.min.js"></script>

<script type="text/javascript">
    jQuery(document).ready(function($){
      $('.deletelink').on('click', function(){
        var getLink = $(this).attr('href');
        swal({
          title: 'Are You Sure?',
          text: '',
          html: true,
          confirmButtonColor:'#d9534f',
          showCancelButton: true,
        },
        function(){
          window.location.href=getLink
        });
        return false;
      });
    });
  </script>
  
</body>
</html>
