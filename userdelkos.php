<?php 
ob_start();
include('cek-sesiuser.php');
include ('control/connection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <link rel="stylesheet" type="text/css" href="plugins/swal/sweetalert.css">
  <script type="text/javascript" src="plugins/swal/sweetalert.min.js"></script>
</head>
<body>

</body>
</html>
<?php
$id = $_GET['idkos'];

if($_GET['idkos']){
  $query = mysqli_query($konek, "DELETE FROM listkos WHERE idkos = $id") or die ("Gagal Melakukan Query Data");

  if($query > 0){
    ?> <script type="text/javascript">swal({title:"Sukses", text:"", type:"success", showConfirmButton: false, timer: 2000}, function(){window.history.back();});</script> <?php
  }else{
    echo "Eror! Gagal Hapus";
  }
}

 ?>
