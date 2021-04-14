<?php
date_default_timezone_set("Asia/Jakarta");
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "db_online_shop";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (mysqli_connect_errno()) {
  echo "Koneksi database gagal : " . mysqli_connect_error();
}

try {
  //create PDO connection 
  $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
} catch (PDOException $e) {
  //show error
  die("Terjadi masalah: " . $e->getMessage());
}
