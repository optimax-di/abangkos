<?php
include ('cekloginadmin.php');
include('cek-sesiadmin.php');
include ('../control/connection.php');
include ('../control/rumahkos.php');;

$tampil = tampildatauser();
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin abangKOS</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
  <link rel="icon" href="../dist/rumahkos.ico">
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

  <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
  <style media="screen">
    table, th, td { text-align: center; }
  </style>
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
        <li><a href="#"><i class="fa fa-home"></i> Beranda</a></li>
        <li class="active"><i class="fa fa-database"></i> &nbsp;Data user</li>
      </ol>
                <div class="row">
              <div class="col-md-12">
              <p class="well lead">Manage Data User | Admin <a href="index.php">abangKOS</a>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
              <table id="datauser" class="table row-border table-bordered table-striped">
                <div class="tambahdata">
                  <a href="tambahdatauser.php" class="btn btn-info"><i class="fa fa-plus lg"></i> New</a>
                </div>
                <br>
                <thead>
                <tr>
                  <th>Fullname</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Alamat</th>
                  <th>HP</th>
                  <th>Email</th>
                  <th>Option</th>
                </tr>
                </thead>

                <tbody>
                <?php
                    while($row = mysqli_fetch_assoc($tampil)):
                ?>
                <tr>
                  <td><?php echo $row['namalengkap'] ?></td>
                  <td><?php echo $row['nama'] ?></td>
                  <td><?php echo $row['password'] ?></td>
                  <td><?php echo $row['alamat'] ?></td>
                  <td><?php echo $row['hp'] ?></td>
                  <td><?php echo $row['email'] ?></td>
                  <td><a class="btn btn-success fa fa-edit" href="editdatauser.php?id_user=<?php echo $row['id_user']; ?>"></a> <a class="btn btn-danger fa fa-trash-o deletelink" href="hapusdatauser.php?id_user=<?php echo $row['id_user']?>"></a></td>
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
</div>


<script src="../plugins/jQuery/jQuery-2.2.0.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="../plugins/fastclick/fastclick.js"></script>
<script src="../assets/js/app.min.js"></script>

<script>
$(function () {
  $('#datauser').DataTable({
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,
  });
});
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