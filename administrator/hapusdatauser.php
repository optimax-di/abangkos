<?php
ob_start();
include ('cekloginadmin.php');
include ('cek-sesiadmin.php');
include ('../control/connection.php');
include ('../control/rumahkos.php');


  $id = $_GET['id_user'];

  if(hapusdatauser($id)){
  	?> <script>swal({title:"Sukses", text:"", type:"success", showConfirmButton: false, timer: 2000}, function(){window.location.href='datauser.php';});</script> <?php
  }else{
    echo "Failed";
  }
ob_end_flush();
?>