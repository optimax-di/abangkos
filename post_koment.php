<?php
include 'control/connection.php';

if (isset($_POST['kirim'])) {
$namatamu = $_POST['namatamu'];
$koment = $_POST['koment'];
$waktu = $_POST['waktu'];
$idkos = $_POST['idkos'];
$query = "INSERT INTO komentar VALUES (NULL, '$namatamu', '$koment', '$waktu', '$idkos')";
$result = mysqli_query($konek, $query);
  // periska query apakah ada error
if(!$result){
die ("Query gagal dijalankan: ".mysqli_errno($konek).
" - ".mysqli_error($konek));
}
}

// melakukan redirect (mengalihkan) ke halaman index.php
header("location:tampilkomentar.php");
header("location:infokos.php?idkos=$idkos&#reviews");
?>

