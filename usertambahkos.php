<?php
include ('cek-sesiuser.php');
include ('control/connection.php');
include ('control/rumahkos.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="zacky" content="rumahkos">
    <title>abangKOS - Cara mudah cari Kost</title>

  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="icon" href="favicon.png">

   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApgTQ7UqKxI3dV6gdmRWN2u7ro7QW_n58" async defer></script>
   <script type="text/javascript">    


   if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function (p) {
        var LatLng = new google.maps.LatLng(p.coords.latitude, p.coords.longitude);
        var mapOptions = {
            center: LatLng,
            zoom: 12,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var image = 'assets/img/abangmarker.png'; //mengganti marker peta
        var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
        var marker = new google.maps.Marker({
            position: LatLng,
            map: map,
            icon: image, //panggil marker yng kita buat
            title: "<b>Lokasi sekarang:</b><br/>Lat: " + "<b>" + p.coords.latitude + "</b>" + "<br />Long: " + "<b>" + p.coords.longitude + "</b>"
        });
        google.maps.event.addListener(marker, "click", function (e) {
            var infoWindow = new google.maps.InfoWindow();
            infoWindow.setContent(marker.title);
            infoWindow.open(map, marker);
        });
    });
} else {
    alert('Browser kamu tidak mendukung geolocation.');
}
</script>

  
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
        <li class="active"><i class="fa fa-hotel"></i> Tambah Kos</li>
      </ol>
              <div class="row">
              <div class="col-md-12">
              <p class="well lead">Masukan Data Kosan Kamu | <a href="index.php">abangKOS</a></p>
    </section>
  
    <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
                  <form class="form" action="" method="POST" enctype="multipart/form-data"> <!-- enctype digunakan utk up data -->
                    <div class="box-body">

                      <div class="form-group">
                        <label for="namapemilik">Nama Pemilik</label>
                          <input type="text" required="" name="namapemilik" class="form-control" placeholder="Nama Pemilik"> 
                        <label for="namakos">Nama Kos</label>
                          <input type="text" required="" name="namakos" class="form-control" placeholder="Nama Kos / Kontrakan">
                   
                        <label for="address">Alamat</label>
                        <input type="text" required="" name="address" class="form-control" placeholder="Masukan alamat lengkap Kosan">
                        <small>*Klik ikon marker lalu salin kordinat kedalam form</small>

                        <br> 
                        <center>
                            
                            <div id="dvMap" style="width: 100%; height: 300px"></div>
                         
                        </center>
                        <br>

                         <label for="koordinat">Latitude & Longitude</label>
                         <div class="row">
                              <div class="col-xs-6">
                                <input type="text" required="" name="latitude" class="form-control" placeholder="cth : -0.5464805">
                              </div>
                              <div class="col-xs-6">
                                <input type="text" required="" name="longitude" class="form-control" placeholder="cth : 102.8737625">
                              </div>
                        </div>

                        <div class="row">
                        <div class="col-md-6">
                          <label for="hp">Telepon</label>
                          <input type="text" required="" name="hp" class="form-control" placeholder="No. Hp Pengelola">
                        </div>
                        </div>
       
                        <label for="harga">Harga</label>
                        <div class="row">
                              <div class="col-xs-6">
                                <input type="text" required="" name="harga" class="form-control" placeholder="Misal : 200.000">
                              </div>

                              <div class="col-xs-6">
                                <select class="form-control" name="pembayaran">
                                  <option value="">--Pilih Periode--</option>
                                  <option value="1 Bulan">1 Bulan</option>
                                  <option value="2 Bulan">2 Bulan</option>
                                  <option value="3 Bulan">3 Bulan</option>
                                  <option value="4 Bulan">4 Bulan</option>
                                  <option value="6 Bulan">6 Bulan</option>
                                  <option value="1 Tahun">1 Tahun</option>
                              </select>
                              </div>
                        </div>

                       <label for="ukuran">Ukuran Kamar</label>
                         <div class="row">
                              <div class="col-xs-6">
                                <input type="text" required="" name="ukuran" class="form-control" placeholder="cth : 3 x 3 m">
                              </div>
                            </div>
        
                       <label for="jumkam">Jumlah & Sisa Kamar</label>
                         <div class="row">
                              <div class="col-xs-6">
                                <input type="text" required="" name="jumkam" class="form-control" placeholder="Jumlah, cth : 5">
                              </div>

                              <div class="col-xs-6">
                                <input type="text" required="" name="tersedia" class="form-control" placeholder="Cth : 2">
                              </div>
                        </div>

                       <label for="harga">Kategori</label>
                         <div class="row">
                              <div class="col-xs-6">
                                <select class="form-control" name="kategori">
                                  <option value="">--Pilih Kategori--</option>
                                  <option value="Umum">Umum</option>
                                  <option value="Putra">Putra</option>
                                  <option value="Putri">Putri</option>
                                  <option value="Keluarga">Keluarga</option>
                                </select>
                              </div>
                         </div>

                       <label for="harga">Akses Kosan</label>
                         <div class="row">
                              <div class="col-xs-6">
                                <select class="form-control" name="akses">
                                  <option value="Akses 24 jam">Akses 24 jam</option>
                                  <option value="Dengan Pemilik">Dengan Pemilik</option>
                                </select>
                              </div>
                         </div>                          

                       <label for="deksripsi">Deskripsi</label>
                        <textarea name="deskripsi" required="" class="form-control" placeholder="Beritahu tentang Kosan kamu. seperti fasilitas, akses jalan, kondisi lingkungan, listrik, air. dll" rows="3" cols="20"></textarea>


                      
                             <label for="gambar">foto landscape format *.png, *.jpg, *.jpeg</label>
                             <input type="file" required="" name="file" id="exampleInputFile">
                          


                           </div>
                           <ul>
                      <div class="pull-right">
                        <input type="submit" name="submit" class="btn btn-success" value="Kirim">
                      </div>

                    

                    </ul>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </section>




<center>
  <footer class="main-footer">
    <strong><a href="#">abangKOS </a>&copy;2017 | Cara Mudah Cari Kos </strong>
  </footer></center>
</div>
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="assets/js/app.min.js"></script>
</body>
</html>

<?php
if(isset($_POST['submit'])){
  $namapemilik = filterinput($_POST['namapemilik']);
  $namakos     = filterinput($_POST['namakos']);
  $address      = filterinput($_POST['address']);
  $latitude    = filterinput($_POST['latitude']);
  $longitude   = filterinput($_POST['longitude']);
  $harga       = filterinput($_POST['harga']);
  $ukuran      = filterinput($_POST['ukuran']);
  $jumkam      = filterinput($_POST['jumkam']);
  $tersedia    = filterinput($_POST['tersedia']);
  $pembayaran  = filterinput($_POST['pembayaran']);
  $kategori    = filterinput($_POST['kategori']);
  $akses       = filterinput($_POST['akses']);
  $deskripsi   = filterinput($_POST['deskripsi']);
  $hp          = filterinput($_POST['hp']);

  $nama        = filterinput($_FILES['file']['name']);
  $ukuranfile  = $_FILES['file']['size'];
  $tmp         = $_FILES['file']['tmp_name'];
  $error       = $_FILES['file']['error'];
  $format      = pathinfo($nama, PATHINFO_EXTENSION);
  $tujuan      = "dist/images/$nama";


  //kasih alert di if else
  if(empty($namapemilik) || empty($namakos) || empty($address) || empty($harga) || empty($ukuran) || empty($jumkam) || empty($tersedia) || empty($pembayaran) || empty($kategori) || empty($akses) || empty($deskripsi) || empty($nama) || empty($hp)){
      ?> <script type="text/javascript">alert('Kolom tidak boleh kosong!')</script><?php
  }
  if($error === 0){
    if($ukuranfile < 1024000000){
      if($format == "jpg" || $format == "png" || $format == "mp4"){
        move_uploaded_file($tmp, $tujuan);

        $query = mysqli_query($konek, "INSERT INTO listkos VALUES ('''' , '".$_SESSION['id_user']."', '$namapemilik', '$namakos', '$address', '$latitude', '$longitude', '$harga', '$ukuran', '$jumkam', '$tersedia', '$pembayaran', '$kategori', '$akses', '$deskripsi', '$nama', '$hp')") or die ('Ada kesalahan');

        if($query){
            ?> <script type="text/javascript">swal({title:"Sukses", text:"", type:"success", showConfirmButton: false, timer: 2000}, function(){window.location.href='userpunyakos.php';});</script> <?php
        }
      }else{
        
      ?> <script type="text/javascript">swal('Support Foto : *.png, *.jpg, *.jpeg', "", "warning");</script> <?php
      }
    }else{
        ?> <script type="text/javascript">swal('File Terlalu Besar', "", "warning"); </script> <?php
    }
  }
}
?>
