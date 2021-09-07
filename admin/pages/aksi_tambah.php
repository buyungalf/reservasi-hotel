<?php 
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
  echo "<center>Untuk mengakses modul, Anda harus login dulu <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$nama = $_POST['nm_kamar'];

	$querySimpan = mysqli_query($koneksi,"INSERT INTO tb_kamar(kamar) VALUES ('$nama')");
	if($querySimpan) {
		echo"<script> alert('Data kamar Berhasil Masuk'); window.location = '$admin_url'+'main.php?pages=kamar'; </script>"; 
	} else {
		echo "<script> alert('Data Kamar Gagal Masuk'); window.location = '$admin_url'+'main.php?pages=tambah_kamar';</script>";
	}
	}				
?>