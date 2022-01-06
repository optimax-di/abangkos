<?php
include('cekloginadmin.php');
include('cek-sesiadmin.php');
include ('../control/connection.php');
include ('../control/rumahkos.php');;

$tmpl = tampildatakos();

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin abangKOS | Manage Data KOs</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
  <link rel="icon" href="../dist/rumahkos.ico">
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

  <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../plugins/swal/sweetalert.css">
  <script type="text/javascript" src="../plugins/swal/sweetalert.min.js"></script>

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
        <li class="active"><a href="adminhome.php"><i class="fa fa-home"></i> <span>Home</span></a></li>
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
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-home"></i> Beranda</li>
      </ol>
          <div class="row">
              <div class="col-md-12">
              <p class="well lead">Manage Data Kos | Admin <a href="index.php">abangKOS</a>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">

              <table id="datakos" class="table table-striped table-bordered wrap" cellspacing="0" width="100%">
                <div class="tambahdata">
                  <!-- Tambah Data  -->
                </div>
                <br>
                <thead>
                  <tr>
                    <th>KID</th>
                    <th>UID</th>
                    <th>Owner</th>
                    <th>Nama Kos</th>
                    <th>HP</th>
                    <th>Addr</th>
                    <th>Koord</th>
                    <th>Harga</th>
                    <th>Size</th>
                    <th>Kmr</th>
                    <th>Ada</th>
                    <th>Tipe</th>
                    <th>Akses</th>
                    <th>Deskr.</th>
                    <th>Gambar</th>
                    <th>Opt</th>
                  </tr>
                </thead>

                <tbody>
                    <?php while($row = mysqli_fetch_assoc($tmpl)): ?>
                  <tr>
                    <td><?php echo $row['idkos']; ?></td>
                    <td><?php echo $row['id_user']; ?></td>
                    <td><?php echo $row['namapemilik']; ?></td>
                    <td><?php echo $row['namakos']; ?></td>
                    <td><?php echo $row['hp']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['latitude']; ?>, <?php echo $row['longitude']; ?></td>
                    <td><?php echo $row['harga']; ?> / <?php echo $row['pembayaran']; ?></td>
                    <td><?php echo $row['ukuran']; ?></td>
                    <td><?php echo $row['jumkam']; ?></td>
                    <td><?php echo $row['tersedia']; ?></td>
                    <td><?php echo $row['kategori']; ?></td>
                    <td><?php echo $row['akses']; ?></td>
                    <td><?php echo $row['deskripsi']; ?></td>
                    <td><img src="../dist/images/<?php echo $row['gambar'] ?>" width="100" height="100" alt="gambar" /></td>
                        <td>
                          <a class="btn btn-info fa fa-edit btn-xs" href="admineditkosuser.php?idkos=<?php echo $row['idkos']; ?>"></a>
                          <a class="btn btn-danger fa fa-trash-o btn-xs deletelink" href="adminhapuskos.php?idkos=<?php echo $row['idkos']?>"></a>
                        </td>
                  </tr>
                  <?php endwhile; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
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
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/fastclick/fastclick.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="../assets/js/app.min.js"></script>

<script type="text/javascript">
  $(function () {
    $('#datakos').DataTable({
      "paging":true,
      "lengthChange": true,
      "searching": true,
      "ordering":true, 
      "info":true,
      "autoWidth":true,
      "responsive":true
      
    });
  })
</script>

  <script type="text/javascript">
    jQuery(document).ready(function($){
      $('.deletelink').on('click', function(){
        var getLink = $(this).attr('href');
        

        swal({
          title: 'Yakin Dihapus ?',
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
