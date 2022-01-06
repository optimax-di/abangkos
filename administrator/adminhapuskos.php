<?php
include('cek-sesiadmin.php');
include ('../control/connection.php');

$id = $_GET['idkos'];

if($_GET['idkos']){
  $query = mysqli_query($konek, "DELETE FROM listkos WHERE idkos = $id") or die ("query hapus gagal");

  if($query > 0){
    ?> <script type="text/javascript">window.history.back();</script> <?php
  }else{
    echo "Something Wrong!!";
  }
}

 ?>
