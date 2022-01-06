

<?php
  include 'control/connection.php';?>

<style type="text/css">

	.wellkomen{
		background-color: rgb(22, 105, 173);
	}
</style>
<?php 

$idkos = $_GET['idkos'];
 $sql = mysqli_query($konek, "SELECT
  `komentar`.`namatamu`,
  `komentar`.`koment`,
  `komentar`.`waktu`
FROM
  `komentar`
  INNER JOIN `listkos` ON `listkos`.`idkos` = `komentar`.`idkos` where `listkos`.`idkos` = '$idkos'");
        while(($data =  mysqli_fetch_assoc($sql))) { ?>


<!-- tampilan komentar-->
<div class="well" id="wellkomen">
<span><b class="label label-success"><?php echo $data['namatamu'] ?></b></span> - 
<cite><span><?php echo $data['koment'] ?></span></cite>
<ul class="list-inline font-xs">
<li class="pull-right">
<small class="text-muted pull-right ultra-light label label-default"><?php echo $data['waktu'] ?></small>
</li>
</ul>
</div>


                        
<?php } ?>


