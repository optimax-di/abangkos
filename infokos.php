<?php
include ('control/connection.php');
include ('control/rumahkos.php');
$tampil = tampilkosperid($_GET['idkos'])
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="zacky" content="rumahkos">
    <title>abangKOS - Cara mudah cari Kost</title>

    <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/user.css">
    <link rel="icon" href="assets/img/abangko.png">

    <link rel="stylesheet" href="plugins/lazyload/jquery.lazyloadxt.spinner.css">
    <script src="assets/js/jquery.js"></script>
    <script src="plugins/lazyload/lazyloadxt.min.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApgTQ7UqKxI3dV6gdmRWN2u7ro7QW_n58" async defer></script>
</head>

<style type="text/css">
.badan{
  background-image: url("assets/img/blur-background-1.jpg");
  background-position: center center;
  background-size: cover; }
a{
  color: #ED2B65;
}
}

</style>
<body class="badan">
  <div class="clearfix">
<!-- navigasi tombol atas --> <!-- navigasi tombol atas --> <!-- navigasi tombol atas --> <!-- navigasi tombol atas -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <strong><div class="navbar-header"><a class="navbar-brand navbar-link" href="index.php"><i class="glyphicon glyphicon-home"></i>abangKOS</a></strong>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active" role="presentation"><a href="usermasuk.php">Masuk</a></li>
                    <li role="presentation"><a href="usertambahkos.php">Daftar KOS</a></li>
                    <li role="presentation"><a href="daftaruser.php">Register</a></li>
                </ul>
            </div>
    </nav>
<!-- navigasi tombol atas --> <!-- navigasi tombol atas --> <!-- navigasi tombol atas --> <!-- navigasi tombol atas -->
<!-- jumbutron --> <!-- jumbutron --> <!-- jumbutron --> <!-- jumbutron -->

<br>
<br>
<br>



<section id="detail">
    <div class="container">
        <?php while($row = mysqli_fetch_assoc($tampil)){
             ?>
            <!-- product -->
          <div class="well lead" id="wells">
          <center><h1><b><?php echo $row['namakos'] ?></b></h1></center>
          </div>
          <div class="product-content product-wrap clearfix product-deatil">
            <div class="row">


                <div class="col-md-6 col-sm-12 col-xs-12 ">

                  <div class="product-image">
                    <div id="myCarousel-2" class="carousel slide">
                    <ol class="carousel-indicators">
                      <li data-target="#myCarousel-2" data-slide-to="0" class=""></li>
                      <li data-target="#myCarousel-2" data-slide-to="1" class="active"></li>
                      <li data-target="#myCarousel-2" data-slide-to="2" class=""></li>
                    </ol>
                    <div class="carousel-inner img-detail">
                      <!-- Slide 1 -->
                      <div class="item active">
                        <img class="img-responsive" src="dist/images/<?php echo $row['gambar'] ?>" alt="">
                      </div>
                      <div class="item">
                        <img class="img-responsive" src="dist/images/<?php echo $row['gambar'] ?>" alt="">
                      </div>
                      <div class="item">
                        <img class="img-responsive" src="dist/images/<?php echo $row['gambar'] ?>" alt="">
                      </div>
                    </div>
                    <a class="left carousel-control" href="#myCarousel-2" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a>
                    <a class="right carousel-control" href="#myCarousel-2" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a>
                    </div>
                  </div>
                </div>
<!-- DETAIL KOST -->
<!-- DETAIL KOST -->

             
                <div class="col-md-6 col-sm-12 col-xs-12" id="penjelasan">
                  <div class="well">
                
                <h4><b>Pemilik : <a href="javascript:void(0);"></a><?php echo $row['namapemilik'] ?></b></h4>
                <b><h4><?php echo $row['address'] ?><i class="glyphicon glyphicon-map-marker"></i></h4></b>

                <h3><span class="label label-danger"><?php echo $row['harga'] ?>/<?php echo $row['pembayaran'] ?></span>
                <span class="label label-info">Sisa <?php echo $row['tersedia'] ?> Kamar</span>
                <small><h6> *Harga sewaktu-waktu bisa berubah</h6></small></h3>
                <h4><span class="label label-primary"><?php echo $row['kategori'] ?></span>
                <span class="label label-success"><?php echo $row['akses'] ?></span></h4>
                <hr>
                <h5><b>Ukuran Kamar : <span class="label label-danger"><?php echo $row['ukuran'] ?></span></b></h5>
                <h5><b>Kontak  : <?php echo $row['hp'] ?></b></h5>
                <h5><b>Deskripsi Kosan : </b></h5>
                <h5><?php echo $row['deskripsi'] ?></h5>
                <hr>
                <small><cite><h6> *Untuk info lebih lanjut kamu bisa menghubungi pemilik kos</h6></cite></small>
                <hr>
                
<!-- =============================================================================================== -->
<!-- =================================== BAGIAN KLIK RATING ======================================== -->
<!-- =============================================================================================== -->
                <?php
include ('rating.php'); ?>

                
               </div> <!-- Class well -->
<!-- =============================================================================================== -->
<!-- =================================== BAGIAN KLIK RATING ======================================== -->
<!-- =============================================================================================== -->
<!-- tab deskripsi -->
<!-- tab deskripsi -->

                <div class="well">
                <div class="description description-tabs">
                  <ul id="myTab" class="nav nav-pills">
                    <li class="active"><a href="#peta" data-toggle="tab" class="tab-detail">Lihat di Peta </a></li>
                <!--    <li class=""><a href="#fasilitas" class="tab-detail" data-toggle="tab">Fasilitas</a></li> -->
                    <li class=""><a href="#reviews" class="tab-detail" data-toggle="tab">Komentar</a></li>
                  </ul>
                  <div id="myTabContent" class="tab-content">

<!-- =============================================================================================== -->
<!-- =================================== BAGIAN PETA MULAI ========================================= -->
<!-- =============================================================================================== -->
<div class="tab-pane fade active in" id="peta">
 <br>
<div class="well" id="dvMap" style="width: 100%; height: 300px"></div>
<script type="text/javascript">
var markers = [
        <?php 
        $sql = mysqli_query($konek, "SELECT * FROM listkos where idkos=$_GET[idkos]");
        while(($data =  mysqli_fetch_array($sql))) {
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
    window.onload = function () {
    LoadMap();  //map nya di load
    }
    function LoadMap() { 
 
//peta di fokuskan ke kota tembilahan
            var mapOptions = {
                center: new google.maps.LatLng(markers[0].lat, markers[0].lng), //koordinat di kosongkan agar tidak fokus ke suatu tempat saja
                maxZoom: 16,  // set batas zoom untuk satu marker
                mapTypeId: google.maps.MapTypeId.ROADMAP

            }; 
            var infoWindow = new google.maps.InfoWindow();
            var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);

            var latlngbounds = new google.maps.LatLngBounds();  //membuat objek boundari maps

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
                        infoWindow.setContent(
                          '<b>' + data.namakos + '</b>'
                        + '<br>' + data.address + '<br>'
                        + '<br> : '  + '<img src="/abangkos/dist/images/' + data.gambar + '" width="128" height="72"/>' + '<br>');

                        infoWindow.open(map, marker);
                    });
                })(marker, data);
        latlngbounds.extend(marker.position);
        var bounds = new google.maps.LatLngBounds(); //ambil boundari dari maps
        //posisikan marker di tengah dan zoom sesuai koordinat
        map.setCenter(latlngbounds.getCenter());
        map.fitBounds(latlngbounds);
            }
        }
    </script>
     </div>
<!-- =============================================================================================== -->
<!-- =================================== BAGIAN PETA SELESAI ======================================= -->
<!-- =============================================================================================== -->

                         <div class="tab-pane fade" id="fasilitas">
                           <br>
                              <div class="fasilitas"> 
                                <div class="col-xs-6 col-md-3">
                               </div>
                             </div>
                         </div>

<div class="tab-pane fade" id="reviews">


<br>
<form method="post" class="well" action="post_koment.php">
<div class="form-group">
<div class="input-group">
</div>
<input type="text" name="namatamu" class="form-control" placeholder="Nama Anda" required="" minlength="3">
</div>
<div class="form-group">
<div class="input-group">
</div>
<textarea name="koment" class="form-control" placeholder="Komentar" required="" minlength="3"></textarea>
</div>
<input type="hidden" name="waktu" value=<?=date('Y-m-d');?>/>
<input type="hidden" name="idkos" value=<?php echo"$_GET[idkos]"?> />
<div class="btn-submit">
<button type="submit" name="kirim" class="btn btn-sm btn-info pull-right">Kirim Review</button>
</div>
<br>
</form>

<?php include "tampilkomentar.php" ?>


</div>
</div>
</div>
</div>



</div>
</div>
</div>
<?php } ?>
</div>
</section>
<br>


<center>
  <div class="container">
          <div class="row">
              <div class="col-md-12">
              <b><p class="well lead">Apa kamu sudah menemukan kos pilihanmu di <a href="www.abangkos.com">abangKOS ?</a></p></b>
            </div>
          </div>
        </div>
  
  <h2>Rekomendasi Kos Lain</h2>
  <br/></center>



    <section id="detail">
    <div class="container">
    <div class="row">
    <div class="col-md-12">
                    <div class="thumbnails">

                        <center>
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
</center>

                  <div class="container">
                    <div class="row">
                        <?php while($row = mysqli_fetch_assoc($res2)){ ?>
                         <div class="col-lg-3 thumb">
                            <a class="thumbnail" href="infokos.php?idkos=<?php echo $row['idkos']; ?>">
                                <img class="lazy-hidden img-responsive" style="width:300px; height:200px;" alt="prevkost" data-src="dist/images/<?php echo $row['gambar'];?>"> </a> 
                                <h4><span class="label label-primary"><?php echo $row['harga'] ?> / <?php echo $row['pembayaran'] ?></span><span class="label label-primary"></span>
                                <span class="label label-danger">Sisa <?php echo $row['tersedia'] ?> Kamar</span></h4>
                                <p><b><?php echo $row['namakos'] ?></b></p>
                                <p><?php echo $row['address'] ?><i class="glyphicon glyphicon-map-marker"></i></p>
                                <h4><span class="label label-warning"><?php echo $row['kategori'] ?></span>
                                <span class="label label-success"><?php echo $row['akses'] ?></span></h4>
                           
                        </div>
                     <?php } ?>
                      </div>
                    </div>
          
                    </div>
      </div>
    </div>
  </div>
  </section> 
 

        <br>
        <div class="row">
        <div class="col-md-12">
        <center>
<div>Kembali ke <a href="index.php">Beranda</a></div>
        </center>
        </div>
        </div>
<!-- footer sudah sampai -->
<!-- footer sudah sampai --> 
<!-- footer sudah sampai --> 
<!-- footer sudah sampai --> 
        <br>
    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h5><b><a href="index.php">abangKOS</a></b> ©2017</h5></div>
                    <center><p>Terima kasih sudah mengunjungi <a href="index.php">abangKOS</a>, Web <a href="index.php"> abangKOS</a> dapat membantu anda dalam mencari kos-kosan sesuai dengan keinginan anda, dengan menentukan lokasi, tipe dan rentang harga sesuai kemampuan anda.
                      Follow juga akun media sosial <a href="index.php">abangKOS</a>
                <div class="col-sm-6 social-icons"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-instagram"></i></a></div></center>
            </div>
        </div>
    </footer>

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</div>
</body>
</html>