<?php 
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
  echo "<center>Untuk mengakses modul, Anda harus login dulu <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$status = $_POST['status'];
	$realname = $_POST['realname'];
	$foto = $_POST['foto'];
	$alamat = $_POST['alamat'];
	$phone = $_POST['phone'];

	$querySimpan = mysqli_query($koneksi,"INSERT INTO tb_user(username, password, status, realname, foto, alamat, phone) VALUES ('$username', '$password', '$status', '$realname', '$foto', '$alamat', '$phone')");
	if($querySimpan) {
		echo"<script> alert('Data user Berhasil Masuk'); window.location = '$admin_url'+'main.php?pages=user'; </script>"; 
	} else {
		echo "<script> alert('Data user Gagal Masuk'); window.location = '$admin_url'+'main.php?pages=tambah_user';</script>";
	}
	}				
?>