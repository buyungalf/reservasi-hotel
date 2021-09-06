<?php 
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
  echo "<center>Untuk mengakses modul, Anda harus login dulu <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$nama = $_POST['nama_jenis_order'];

	$querySimpan = mysqli_query($koneksi,"INSERT INTO tb_order_jenis(jenis_order) VALUES ('$nama')");
	if($querySimpan) {
		echo"<script> alert('Data Jenis Order Berhasil Masuk'); window.location = '$admin_url'+'main.php?pages=jenis_order'; </script>"; 
	} else {
		echo "<script> alert('Data Jenis Order Gagal Masuk'); window.location = '$admin_url'+'main.php?pages=tambah_jenis_order';</script>";
	}
	}				
?>