<?php include("control/configurasi.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="zacky" content="rumahkos">
	
	<title>Gallery</title>
	<link rel="icon" href="assets/img/abangko.png">
	
	<link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="assets/css/jasny-bootstrap.css" rel="stylesheet">
	<link href="assets/css/custom.css" rel="stylesheet">

	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	</head>
<body>

	<?php include("navbar.php"); ?>
	
	<div class="container body">
		<h1>Upload</h1>
		<form method="post" action="upload-proses.php" enctype="multipart/form-data">
			<div class="fileinput fileinput-new" data-provides="fileinput">
			  <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
				<img data-src="holder.js/100%x100%" alt="">
			  </div>
			  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 400px; max-height: 300px;"></div>
			  <div>
				<span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="foto" required></span>
				<input type="submit" class="btn btn-primary" name="submit" value="Upload">
			  </div>
			</div>
		</form>
	</div>
	
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/jasny-bootstrap.js"></script>
	
</body>
</html>