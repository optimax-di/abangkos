<?php
include ('cek-sesiuser.php');
include ('control/connection.php');
include ('control/rumahkos.php');

$id = $_GET['idkos'];
$tampil = tampilkosperid($id);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>abangKOS - Edit KOs</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" type="text/css" href="plugins/swal/sweetalert.css">
  <script type="text/javascript" src="plugins/swal/sweetalert.min.js"></script>
  <link rel="icon" href="assets/img/abangko.png">

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApgTQ7UqKxI3dV6gdmRWN2u7ro7QW_n58&callback=initMap"
  type="text/javascript"></script>
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
        <li class=""><i class="fa fa-home"></i> <a href="userberanda.php"> Home</a></li>
        <li class="active"><i class="fa fa-user"></i> Profil Saya</li>
      </ol>
              <div class="row">
              <div class="col-md-12">
              <p class="well lead">Edit Data Kosan Kamu | <a href="index.php">abangKOS</a></p>
    </section>
    <!--isi-->
    <section class="content">
      <?php while($hsl = mysqli_fetch_assoc($tampil)): ?>
      <div class="container">
        <div class="row">
          <div class="col-md-6">
                  <form class="form" action="" method="POST" enctype="multipart/form-data">
                    <div class="box-body">



                          <label for="namapemilik">Nama Pemilik</label>
                          <input type="text" name="namapemilik" class="form-control" value="<?php echo $hsl['namapemilik']; ?>"> 

                          <label for="namakos">Nama Pemilik Kos</label>
                          <input type="text" name="namakos" class="form-control" value="<?php echo $hsl['namakos']; ?>">

                          <label for="alamat">Alamat</label>
                          <textarea name="address" class="form-control" rows="2" cols="60"><?php echo $hsl['address']; ?></textarea>

<!--

                       <div class="form-group">
                       <label for="Koordinat">Koordinat Lokasi</label>
                         <div class="row">
                              <div class="col-xs-6">
                                <input type="text" name="latitude" class="form-control" value="<?php echo $hsl['latitude']; ?>">
                              </div>

                              <div class="col-xs-6">
                                <input type="text" name="longitude" class="form-control" value="<?php echo $hsl['longitude']; ?>">
                              </div>
                        </div>
                      </div> -->

                          <label for="hp">No HP Pengelola</label>
                          <input type="text" name="hp" class="form-control" value="<?php echo $hsl['hp']; ?>">

                      <div class="form-group">
                       <label for="harga">Harga</label>
                         <div class="row">
                              <div class="col-xs-6">
                                <input type="text" name="harga" class="form-control" value="<?php echo $hsl['harga']; ?>">
                              </div>

                              <div class="col-xs-6">
                                <select class="form-control" name="pembayaran">
 
                                  <option value="1 Bulan" <?php if($hsl['pembayaran'] == '1 Bulan') {echo 'selected'; } ?>>1 Bulan</option>
                                  <option value="2 Bulan" <?php if($hsl['pembayaran'] == '2 Bulan') {echo 'selected'; } ?>>2 Bulan</option>
                                  <option value="3 Bulan" <?php if($hsl['pembayaran'] == '3 Bulan') {echo 'selected'; } ?>>3 Bulan</option>
                                  <option value="4 Bulan" <?php if($hsl['pembayaran'] == '4 Bulan') {echo 'selected'; } ?>>4 Bulan</option>
                                  <option value="6 Bulan" <?php if($hsl['pembayaran'] == '5 Bulan') {echo 'selected'; } ?>>6 Bulan</option>
                                  <option value="1 Tahun" <?php if($hsl['pembayaran'] == '1 Tahun') {echo 'selected'; } ?>>1 Tahun</option>
                              </select>
                              </div>
                        </div>
                      </div>


                      <div class="form-group">
                       <label for="ukuran">Ukuran Kamar</label>
                         <div class="row">
                              <div class="col-xs-6">
                                <input type="text" name="ukuran" class="form-control" value="<?php echo $hsl['ukuran']; ?>">
                              </div>
                        </div>
                      </div>


                      <div class="form-group">
                       <label for="jumkam">Jumlah & Sisa Kamar</label>
                         <div class="row">
                              <div class="col-xs-6">
                                <input type="text" name="jumkam" class="form-control" value="<?php echo $hsl['jumkam']; ?>">
                              </div>

                              <div class="col-xs-6">
                                <input type="text" name="tersedia" class="form-control" value="<?php echo $hsl['tersedia']; ?>">
                              </div>
                        </div>
                      </div>




                    <div class="form-group">
                       <label for="kategori">Kategori</label>
                         <div class="row">
                          <div class="col-xs-6">
                        <select class="form-control" name="kategori">
                          <div class="col-xs-6">
                                  <option value="Umum" <?php if($hsl['kategori'] == 'Umum') {echo 'selected'; } ?>>Umum</option>
                                  <option value="Putra" <?php if($hsl['kategori'] == 'Putra') {echo 'selected'; } ?>>Putra</option>
                                  <option value="Putri" <?php if($hsl['kategori'] == 'Putri') {echo 'selected'; } ?>>Putri</option>
                                  <option value="Keluarga" <?php if($hsl['kategori'] == 'Keluarga') {echo 'selected'; } ?>>Keluarga</option>
                                </div>
                              </select>
                            </div>
                        </div>
                      </div>

                    <div class="form-group">
                       <label for="akes">Akses Kosan</label>
                         <div class="row">
                          <div class="col-xs-6">
                        <select class="form-control" name="akses">
                           <option value="Akses 24 Jam" <?php if($hsl['akses'] == 'Akses 24 Jam') {echo 'selected'; } ?>>Akses 24 Jam</option>
                           <option value="Dengan Pemilik" <?php if($hsl['akses'] == 'Dengan Pemilik') {echo 'selected'; } ?>>Dengan Pemilik</option>
                        </select>
                            </div>
                        </div>
                      </div>

                    <div class="form-group">
                       <label for="deksripsi">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="3" cols="20"><?php echo $hsl['deskripsi']; ?></textarea>
                    </div>
    

                    <div class="form-group">
                       <label for="gambar">Klik untuk upload gambr baru</label><br>
                              <td><img src="dist/images/<?php echo $hsl['gambar'] ?>" name="file" width="100" height="100" alt="gambar" /></td><br>
                            <span>Gambar Baru : <input type="file" name="file"></span><br>
                    </div>

                      <div class="pull-right">
                        <a href="userpunyakos.php" class="btn btn-warning">Cancel</a>
                        <input type="submit" name="submitedit" class="btn btn-primary" value="Edit">
                      </div>
                  </form>
                </div>
          </div>
        <?php endwhile; ?>
  </section></div>

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



<?php
if(isset($_POST['submitedit'])){
  $namapemilik = $_POST['namapemilik'];
  $namakos    = $_POST['namakos'];
  $address    = $_POST['address'];
  $hp         = $_POST['hp'];
  $harga      = $_POST['harga'];
  $pembayaran = $_POST['pembayaran'];
  $ukuran     = $_POST['ukuran'];
  $jumkam     = $_POST['jumkam'];
  $tersedia   = $_POST['tersedia'];
  $kategori   = $_POST['kategori'];
  $akses      = $_POST['akses'];
  $deskripsi  = $_POST['deskripsi'];
  

  $idkos      = $_GET['idkos'];
  $nama       = $_FILES['file']['name'];
  $ukuranfile = $_FILES['file']['size'];
  $tmp        = $_FILES['file']['tmp_name'];
  $error      = $_FILES['file']['error'];
  $format     = pathinfo($nama, PATHINFO_EXTENSION);
  $tujuan     = "dist/images/$nama";

if(
  $namapemilik == "" ||
  $namakos == "" ||
  $address == "" ||
  $hp == "" ||
  $harga == "" ||
  $tersedia == "" ||
  $deskripsi == "")
{
    ?> <script type="text/javascript">alert('Mohon data kos diisi semua');</script> <?php
}else{
        $query = mysqli_query($konek, "UPDATE listkos SET
                                     namapemilik = '$namapemilik',
                                     namakos = '$namakos',
                                     address= '$address',
                                     hp = '$hp',
                                     harga = '$harga',
                                     pembayaran = '$pembayaran',
                                     ukuran = '$ukuran',
                                     jumkam = '$jumkam',
                                     tersedia = '$tersedia',
                                     kategori = '$kategori',
                                     akses = 'akses',
                                     deskripsi = '$deskripsi'

                                     WHERE idkos = $idkos") or die ('Ada kesalahan dalam Query');
        if($query){
          ?><script>swal({title:"Data Berhasil di Edit", text:"", type:"success", showConfirmButton: false, timer: 2000}, function(){window.location.href='userpunyakos.php';});</script><?php
    }
 }
   if($error === 0){
       move_uploaded_file($tmp , $tujuan);
         $query = mysqli_query($konek, "UPDATE listkos SET
                                     namapemilik = '$namapemilik',
                                     namakos = '$namakos',
                                     address= '$address',
                                     hp = '$hp',
                                     harga = '$harga',
                                     pembayaran = '$pembayaran',
                                     ukuran = '$ukuran',
                                     jumkam = '$jumkam',
                                     tersedia = '$tersedia',
                                     kategori = '$kategori',
                                     akses = 'akses',
                                     deskripsi = '$deskripsi'
                                     
                                     WHERE idkos = $idkos") or die ('Ada kesalahan dalam Query');
         if($query){
           ?><script>swal({title:"Data Berhasil di Edit", text:"", type:"success", showConfirmButton: false, timer: 2000}, function(){window.location.href='userpunyakos.php';});</script><?php
         }
    }
 }

 ?>

