<?php

/**
 * Namafile : connection.php 
 * ----------------------------*/

$host = 'localhost'; 
$user = 'root';     // ini berlaku di xampp
$pw   = '';         // ini berlaku di xampp
$db   = 'db_rumahkos-lama';

// melakukan koneksi ke database
$konek = new mysqli($host, $user, $pw, $db);

// cek koneksi yang kita lakukan berhasil atau tidak
if ($konek->connect_error) {
   // jika terjadi error, matikan proses dengan die() atau exit();
   die('Maaf koneksi gagal: '. $konek->connect_error);
}
?>    