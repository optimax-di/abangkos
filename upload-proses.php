<?php
//sumber w3schools.com
include("control/configurasi.php");
$target_dir = "gallery/";
$target_file = $target_dir . basename($_FILES["foto"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {

	// Check if file already exists
	if (file_exists($target_file)) {
		echo "File dengan nama yang sama sudah ada!. ";
		$uploadOk = 0;
	}
	// Check file size
	if ($_FILES["foto"]["size"] > 10000000) {
		echo "File terlalu besar. ";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
		echo "Foto yang didukung hanya JPG, JPEG, PNG & GIF. ";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Foto kamu gagal di Upload.";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
			$nama = basename( $_FILES["foto"]["name"]);
			$tgl = date("Y-m-d");
			$query = $koneksi->query("INSERT INTO galeri(tgl_upload, nama) VALUES('$tgl','$nama')") or die($koneksi->error);
			if($query){
				$i = $koneksi->insert_id;
				header("Location: foto.php?id=".$i);
			}else{
				echo '<script>alert("Gagal sob!"); document.location="upload.php?menu=upload";</script>';
			}
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
}
?>