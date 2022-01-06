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



  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="icon" href="assets/img/abangko.png">

    <link rel="stylesheet" href="assets/css/user.css">
    <link rel="stylesheet" href="plugins/lazyload/jquery.lazyloadxt.spinner.css">
    <script src="assets/js/jquery.js"></script>
    <script src="plugins/lazyload/lazyloadxt.min.js"></script>

   



</head>

<body>
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
<center>
<div class="jumbotron">
  <h1>Cari Kos? yaa di <strong>abangKos</strong></h1>
  <p>Cari kosan mudah di abangkos. Silahkan melihat-lihat anggap saja kosan sendiri</p>
 <!-- <p><a class="btn btn-info btn-lg" href="#" role="button">Selengkapnya</a></p> -->
  
</div></center>

<!-- jumbutron --> <!-- jumbutron --> <!-- jumbutron --> <!-- jumbutron -->

           <div class="container">
        <div class="row">
            <div class="col-md-12"><form action="cari.php" method="GET">
                                       <center><select name="kategori" class="btn btn-default search">
                                         <option value="">-Tipe Kos-</option>
                                        <option value="umum" >Umum</option>
                                        <option value="pria" >Pria</option>
                                        <option value="wanita" >Wanita</option>
                                    
                                  </select>
                                  <select name="wilayah" class="btn btn-default search">
                                        <option value="">-Area-</option>
                                        <option value="Tembilahan Hilir" > Tembilahan Hilir</option>
                                        <option value="Tembilahan Kota" > Tembilahan Kota</option>
                                        <option value="Tembilahan Hulu" > Tembilahan Hulu</option>
                                        <option value="Pulau Palas" > Pulau Palas</option>
                                        <option value="Tempuling" > Tempuling</option>
                                        <option value="Sungai Salak" > Sungai Salak</option>
                                        <option value="Teluk Jira" > Teluk Jira</option>
                                        <option value="Rumbai Jaya" > Rumbai Jaya</option>
                                        <option value="Sungai Sejuk" > Sungai Sejuk</option>
                                        <option value="Sungai Gantang" > Sungai Gantang</option>
                                        <option value="Sungai Ara" > Sungai Ara</option>
                                        <option value="Kempas Jaya" > Kempas Jaya</option>

                                  </select>
                                  <select name="harga" class="btn btn-default search">
                                       <option value="">-Rentang Harga-</option>
                                         <option value="1">200.00 - 300.000</option>
                                        <option value="2">300.000 - 500.000</option>
                                        <option value="3">500.000 - 1.000.000</option>
                                        <option value="4">1.000.000 - 2.000.000</option>
                                  </select> 
                                  <hr>

                                  <button type="submit" name="pencarian" class="btn btn-success">Cari Kosan</button></center>
                                  </form>

                                  <hr>
                                </div>
                              </div>
                            </div>
                            <center>
              <?php
         if(isset($_GET['pencarian']))
            {
            $hargakos = $_GET['harga'];
            $kategori = $_GET['kategori'];
            $wilayah = $_GET['wilayah'];

              if($hargakos == 1){
              $harga = 'harga BETWEEN 200000 AND 300000 AND';
              }elseif($hargakos == 2){
                 $harga = 'harga BETWEEN 300000 AND 500000 AND';
              }elseif($hargakos == 3){
                $harga = 'harga BETWEEN 500000 AND 1000000 AND';
              }elseif($hargakos == 4){
                $harga = 'harga BETWEEN 1000000 AND 2000000 AND';
              }else{
                $harga = "";
              }

            $cari = mysqli_query($konek, "SELECT * FROM listkos WHERE $harga kategori like '%$kategori%' AND address like '%$wilayah%' ") or die ('query cari gagal');

            if(mysqli_num_rows($cari) == 0 ){
            echo "<h2 style='color:green;margin-bottom:220px;margin-left:15px;'>Ooooppss! Maaf ya... Sepertinya kos yang seperti itu belum ada &#128546</h2>";
            }else{
              while($row = mysqli_fetch_assoc($cari)){
            ?>
                  <div class="container">
                    <div class="row">
                         <div class="col-lg-3 thumb">
                            <a class="thumbnail" href="infokos.php?idkos=<?php echo $row['idkos']; ?>">
                                <img class="lazy-hidden img-responsive" style="width:300px; height:200px;" alt="prevkost" data-src="dist/images/<?php echo $row['gambar'];?>"> </a> 
                                <h4><span class="label label-primary"><?php echo $row['harga'] ?> / <?php echo $row['pembayaran'] ?></span>
                                  <span class="label label-danger">Sisa <?php echo $row['tersedia'] ?> Kamar</span></h4>
                                <p><b><?php echo $row['namakos'] ?></b></p>
                                <p><?php echo $row['address'] ?></p>
                                <a><h4><span class="label label-warning"><?php echo $row['kategori'] ?></span>
                                <span class="label label-success"><?php echo $row['akses'] ?></span></h4></a>
                            <hr>
                        </div>
                <?php
                }
                }
                 }
                ?>
                  </div>
            </div>
                <br> <br>
                </center>

                
<!-- footer sudah sampai -->
<!-- footer sudah sampai --> 
<!-- footer sudah sampai --> 
<!-- footer sudah sampai --> 
        <br>
        <br>
        <br>
      <div class="container">        
        <hr class="dashed" />
        <div class="row">
          <div class="col-sm-4 col-md-4">
            <h3>Rekomendasi Kos</h3>
            <p>abangKos merekomendasikan kos terbaik</p>
          </div>
          <div class="col-sm-4 col-md-4">
            <h3>Temukan dengan GPS</h3>
            <p>abangKos mudah di temukan dengan gps</p>
          </div>
          <div class="col-sm-4 col-md-4">
            <h3>Ketemu bug/masalah?</h3>
            <p>Laporkan ke admin abangkos, agar kami cepat melakukan perbaikan aplikasi</p>
          </div>
        </div>

                <br>
                <br>


        <div class="site-footer">
        <hr class="dashed" />
        <div class="row">
          <div class="col-md-4">
            <h3>Ceritakan pada kami</h3>
              <span>Tweet kami di <a href="https://twitter.com" target="_blank">@abangkos</a></span> 
              <span>atau Email kami di <a href="contactus.php">admin@abangkos.com</a></span>
          </div>
<br>
          <div class="col-md-4">
        <div class="row">
          <span class="download">Download Aplikasi <b>abangKos</b></span>&nbsp;&nbsp;&nbsp;&nbsp;
          <a class="btn btn-info" href="#">Download Sekarang</a>&nbsp;&nbsp;&nbsp;&nbsp;
          </div>
        </div>
        </div>

        <hr class="dashed" />
        <div class="copyright clearfix">
          <p><b>abangKos </b>&copy;2017</p>
          <p> ---- <a href="#"> --- </a> ---- <a href="#"> ---- </a>.</p>
        </div>
      </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>