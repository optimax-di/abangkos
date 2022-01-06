<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
date_default_timezone_set('Asia/Jakarta');
session_start();

$koneksi = new mysqli("localhost", "root", "", "db_rumahkos-lama");
if ($koneksi->connect_errno) {
    echo die("Failed to connect to MySQL: " . $conn->connect_error);
}
?>