<?php
include('cek-sesiadmin.php');
include ('../control/connection.php');
include ('../control/rumahkos.php');;


$id = $_GET['idkos'];
$tampil = tampilkosperid($id);

// var_dump($tampil);

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin abangKOS | Manage Kos User</title>
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
        <li class="active"><a href="adminhome.php"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
        <li class="active"><a href="datakos.php"><i class="fa fa-hotel"></i> <span>Data Kos</span></a></li>
        <li class="active"><a href="datauser.php"><i class="fa fa-user"></i> <span>Data User</span></a></li>
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
        <li class="active"><i class="fa fa-pencil"> Edit Kost</i></li>
      </ol>
              <div class="row">
              <div class="col-md-12">
              <p class="well lead">Edit Data Kos User | <a href="index.php">abangKOS</a></p>

    </section>
    <!--isi-->
    <section class="content">
      <?php while($hsl = mysqli_fetch_assoc($tampil)): ?>
      <div class="container">
        <div class="row">
          <div class="col-md-6">
                  <form class="form" action="" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                      <div class="form-group">


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
                       <label for="akses">Akses Kosan</label>
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
                       <label for="gambar">Gambar Kost</label><br>
                              <td><img src="../dist/images/<?php echo $hsl['gambar'] ?>" name="file" width="240" height="144" alt="gambar" /></td><br>
                            <span>Gambar Baru : <input type="file" name="file"></span><br>
                    </div>

                      <div class="pull-right">
                        <a href="datakos.php" class="btn btn-warning">Kembali</a>
                        <input type="submit" name="submitedit" class="btn btn-primary" value="Edit">
                      </div>
                  </form>
                </div>
          </div>
        <?php endwhile; ?>
  </section></div>
          <footer class="main-footer">
               <strong><a href="#">RumahKOS </a>&copy;2017 | Cara Mudah Cari Kos </strong>
          </footer>

          <div class="control-sidebar-bg"></div>
        </div>
<script src="../plugins/jQuery/jQuery-2.2.0.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/js/app.min.js"></script>
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
  $tujuan     = "../dist/images/$nama";

if(
  $namapemilik == "" ||
  $namakos == "" ||
  $address == "" ||
  $hp == "" ||
  $harga == "" ||
  $pembayaran == "" ||
  $ukuran == "" ||
  $jumkam == "" ||
  $tersedia == "" ||
  $kategori == "" ||
  $akses == "" ||
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
          ?><script>swal({title:"Data Berhasil di Edit", text:"", type:"success", showConfirmButton: false, timer: 2000}, function(){window.location.href='datakos.php';});</script><?php
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
           ?><script>swal({title:"Data Berhasil di Edit", text:"", type:"success", showConfirmButton: false, timer: 2000}, function(){window.location.href='datakos.php';});</script><?php
         }
    }
 }

 ?>

