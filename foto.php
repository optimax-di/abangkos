<?php include("control/configurasi.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Gallery</title>
	<link rel="icon" href="assets/img/abangko.png">
	<link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="assets/css/custom.css" rel="stylesheet">
	</head>
<body>

	<?php include("navbar.php"); ?>

	<div class="container body">
		<?php
		$id = $_GET['id'];
		$query = $koneksi->query("SELECT * FROM galeri WHERE id='$id'") or die($koneksi->error);
		if($query->num_rows){
			$row = $query->fetch_assoc();
			echo '
			<h1>Informasi foto</h1>
			<div class="row">
				<div class="col-md-8">
					<img src="gallery/'.$row['nama'].'" class="img-responsive">
				</div>
			</div>
			';
		}else{
			echo '404 Not Found!';
		}
		?>
	</div>

	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>