<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "db_homestay";

$koneksi = mysqli_connect($server,$username,$password,$database);

if(mysqli_connect_errno()) {
	echo "Failed to connect to MySQL : " . mysqli_connect_errno();
	exit();
}

?>