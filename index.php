<?php
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
    <link rel="icon" href="assets/img/abangko.png">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="plugins/lazyload/jquery.lazyloadxt.spinner.css">
    <script src="assets/js/jquery.js"></script>
    <script src="plugins/lazyload/lazyloadxt.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApgTQ7UqKxI3dV6gdmRWN2u7ro7QW_n58" async defer></script>

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/creative.min.css" rel="stylesheet"> 
    <link href="assets/css/ribbon.css" rel="stylesheet"> 
    <link href="assets/css/user.css" rel="stylesheet"> 
<!-- =============================================================================================== -->
<!-- =================================== SECTION MAPS JS START ===================================== -->
<!-- =============================================================================================== -->
    <script type="text/javascript">
var markers = [
        <?php 
        $sql = mysqli_query($konek, "SELECT * FROM listkos");
        while(($data =  mysqli_fetch_assoc($sql))) {
        ?>
        {
                 "latitude" : '<?php echo $data['latitude']; ?>',
                 "longitude": '<?php echo $data['longitude']; ?>',
                 "namakos"  : '<?php echo $data['namakos']; ?>',
                 "address"  : '<?php echo $data['address']; ?>',
                 "gambar"   : '<?php echo $data['gambar']; ?>'
        },
        <?php
        }
        ?>
    ];
    </script>
    
    <script type="text/javascript">
        window.onload = function () {
        LoadMap();
    }
    function LoadMap() {

//peta di fokuskan ke kota tembilahan
            var mapOptions = {
                center: new google.maps.LatLng(markers[0].lat, markers[0].lng),
                 // zoom: 12, //ukuran zoom peta
                mapTypeId: google.maps.MapTypeId.ROADMAP

            }; 
            var infoWindow = new google.maps.InfoWindow();
            var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);

            var latlngbounds = new google.maps.LatLngBounds();

            for (i = 0; i < markers.length; i++) {
                var data = markers[i];
                var latnya = data.latitude;
                var longnya = data.longitude;
                
                var image = 'assets/img/marker.png'; //mengganti marker peta
                var myLatlng = new google.maps.LatLng(latnya, longnya);
                var marker = new google.maps.Marker({
                    position: myLatlng,
                    map: map,
                    icon: image, //panggil marker yng kita buat
                    title: data.address,
                    title: data.namakos,
                    title: data.gambar

                });
                (function (marker, data) {
                    google.maps.event.addListener(marker, "click", function (e) {
                        infoWindow.setContent('<h5>Informasi</h5><br>'
                        + '<b>Nama Kos</b> : ' + data.namakos
                        + '<br><b>Alamat</b> : ' + data.address + '<br>'
                        + '<br> : '  + '<img src="/abangkos/dist/images/' + data.gambar + '" width="240" height="190"/>' + '<br>');


                        infoWindow.open(map, marker);
                    });
                })(marker, data);

 //Extend each marker's position in LatLngBounds object.
            latlngbounds.extend(marker.position);
 
        //Get the boundaries of the Map.
        var bounds = new google.maps.LatLngBounds();
 
        //Center map and adjust Zoom based on the position of all markers.
        map.setCenter(latlngbounds.getCenter());
        map.fitBounds(latlngbounds);

            }
        }

    </script>
<!-- =============================================================================================== -->
<!-- =================================== SECTION STYLE START ======================================= -->
<!-- =============================================================================================== -->
    <style type="text/css">
header.masthead {
  padding-top: 10rem;
  padding-bottom: calc(10rem - 56px);
  background-image: url("assets/img/header1.jpg");
  background-position: center center;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover; }
    </style>

  </head>
  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">abangKOs</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="usermasuk.php">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="usertambahkos.php">Daftar Kos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="daftaruser.php">Register</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <header class="masthead text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h1 class="text-uppercase">
              <strong>Welcome to abangKOs</strong>
            </h1>
            <hr>
          </div>
          <div class="col-lg-8 mx-auto">
            <p class="text-faded mb-5">Selama ini sudah capek cari kos sana sini tapi gak dapet-dapet? Selamat! Kamu udah nyasar ke abangkos. Lewat abangkos kamu bisa dengan mudah cari kos-kosan sesuai keinginanmu</p>
            <a class="btn btn-primary btn-xl js-scroll-trigger" href="#kos">Ayo Cari Kos!</a>
          </div>
        </div>
      </div>
    </header>


<!--FILTER --> <!--FILTER --><!--FILTER --><!--FILTER --><!--FILTER -->
<center>
<section id="semuakos">
  <div class="container">
    <div class="row">
      <div class="col-md-12"><form action="cari.php" method="GET">
                                  <select name="kategori" class="btn btn-info search">
                                        <option value="">-Tipe Kos-</option>
                                        <option value="umum" >Umum</option>
                                        <option value="pria" >Pria</option>
                                        <option value="wanita" >Wanita</option>
                                  </select>
                                  <select name="wilayah" class="btn btn-info search">
                                        <option value="">-Area-</option>
                                        <option value="Tembilahan Hilir" > Tembilahan Hilir</option>
                                        <option value="Tembilahan Kota" > Tembilahan Kota</option>
                                        <option value="Tembilahan Hulu" > Tembilahan Hulu</option>
                                  </select>
                                  <select name="harga" class="btn btn-info search">
                                       <option value="">-Rentang Harga-</option>
                                         <option value="1">200.00 - 300.000</option>
                                        <option value="2">300.000 - 500.000</option>
                                        <option value="3">500.000 - 1.000.000</option>
                                        <option value="4">1.000.000 - 2.000.000</option>
                                  </select> 
                                  <button type="submit" name="pencarian" class="btn btn-success">Filter</button>
      </div>
    </div>
  </div>
  </section>
</center>
<!--FILTER --><!--FILTER --><!--FILTER --><!--FILTER --><!--FILTER --><!--FILTER -->

<!-- =============================================================================================== -->
<!-- =================================== SECTION KOS START ========================================= -->
<!-- =============================================================================================== -->

    <section class="bg-primary" id="kos">
<?php
            $tampil = tampilkos();
            $perPage = 4;
            $page = isset($_GET["p"]) ? (int)$_GET["p"] : 0;
            $start = ($page > 1) ? ($page * $perPage) - $perPage : 0;
            $kos = "SELECT * FROM listkos ORDER BY idkos DESC LIMIT $start, $perPage ";
            $total = mysqli_num_rows($tampil);
            $pages = ceil($total/$perPage);
            $res2 = mysqli_query($konek, $kos);
            ?> 

<div class="container">
  <div class="row text-center">
    <?php while($row = mysqli_fetch_assoc($res2)){ ?> <!-- mulai di ulang-ulang -->
<!--<div class="col-lg-3 col-md-6 mb-4"> mini box pakai yg ini aja -->
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">  
      <div class="card">
        <a href="infokos.php?idkos=<?php echo $row['idkos']; ?>">

      <div class="ribbon blue"><span><?php echo $row['kategori'] ?></span></div>
      <div class="ribbon1"><span><?php echo $row['akses'] ?></span></div>
      
      <img class="img-rounded" style="width:100%; height:200px;" alt="Gagal Meload Gambar" data-src="dist/images/<?php echo $row['gambar'];?>"></a>
      <div class="card-body">
      <h5 class="btm btn-success btn-sm"><?php echo $row['namakos'] ?></h5>
      
      
      <h5><span class="btn btn-primary btn-sm"><?php echo $row['harga'] ?> / <?php echo $row['pembayaran'] ?></span>
      <span class="btn btn-danger btn-sm"><?php echo $row['tersedia'] ?> Kamar</span></h5>
      </div>

      <div class="card-footer">
      <p class="card-text"><?php echo $row['address'] ?></p>
      </div>
      </div>
      <br>
      </div>
      <?php } ?> <!-- ulang-ulang selesai-->
    </div>
  </div>

<hr class="dashed">
<div class="container">
<div class="col-md-12">
          <ul class="pagination">
            <?php for($i=1; $i<=$pages;$i++) {
                if ($page == $i)
                    echo "<li class='active' >";
                else
                    echo "<li>";
            echo "<a href='index.php?p=$i'>$i</a></li>";
            ?>Page
              <?php } ?>
          </ul>
</div>
</div>

</section>
<!-- =============================================================================================== -->
<!-- =================================== SECTION MAPS START ======================================== -->
<!-- =============================================================================================== -->
    <section class="maps" id="maps">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Maps abangKos</h2>
            <div id="dvMap" style="width: 100%; height: 500px"></div>
          </div>
        </div>
      </div>
    </section>
<!-- =============================================================================================== -->
<!-- =================================== SECTION SERVICES ========================================== -->
<!-- =============================================================================================== -->

    <section id="services">
      <div class="container">
        <center><h2 class="section-heading">Mengapa abangKos?</h2></center>
        <div class="row">
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-hand-peace-o text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">Mudah</h3>
              <p class="text-muted mb-0">Cari Kos mudah di abangkos</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-paper-plane text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">Langsung Cek</h3>
              <p class="text-muted mb-0">Kamu bisa langsung mendapatkan kos pilihanmu</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-newspaper-o text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">Up to Date</h3>
              <p class="text-muted mb-0">abangKos memberikan informasi terbaru seputar kos-kosan.</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-heart text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">Made with Love</h3>
              <p class="text-muted mb-0">Kami persembahkan untuk anda dengan cinta!</p>
            </div>
          </div>
        </div>
      </div>
    </section>

<!-- =============================================================================================== -->
<!-- =================================== SECTION SERVICE END ======================================== -->
<!-- =============================================================================================== -->

    <section class="kaki text-white">

      <div class="container text-center">
        <h2 class="mb-4">Gratis Daftar Kos bagi anda yang ingin promosi kos disini</h2>
        <a class="btn btn-light btn-xl sr-button" href="daftaruser.php">Daftar Sekarang!</a>
        <hr class="dashed">
      <div class="container">
        <center><b>Hubungi Kami di</b></center>
        <div class="row">

          <div class="col-lg-4 ml-auto text-center">
            <a href="https://www.instagram.com/zacky_marzuki"><i class="fa fa-instagram fa-3x mb-3 sr-contact"></i></a>
            <p>@zacky_marzuki</p>
          </div>
          <div class="col-lg-4 ml-auto text-center">
            <i class="fa fa-whatsapp fa-3x mb-3 sr-contact"></i>
            <p>0823-8321-5044</p>
          </div>
          <div class="col-lg-4 mr-auto text-center">
            <a href="mailto:zackyponsell@gmail.com"><i class="fa fa-envelope-o fa-3x mb-3 sr-contact"></i></a>
            <p>zackyponsell@gmail.com</p>
            </p>
          </div>
        </div>
        <center><b>abangkos &copy;2017 - Tembilahan - Inhil, Riau, Indonesia</b></center>
      </div>

    </section>

    <!-- Bootstrap core JavaScript -->
    <script src="assets/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Plugin JavaScript -->
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script> <!-- pop up icon pakai ini -->
    <!-- Custom scripts for this template -->
    <script src="assets/js/creative.min.js"></script>


  </body>

</html>
