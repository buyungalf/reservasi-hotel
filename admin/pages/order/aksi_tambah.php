<?php 
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
  echo "<center>Untuk mengakses modul, Anda harus login dulu <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$nama = $_POST['nama_order'];
	$jenis_order = $_POST['jenis_order'];
	$harga = $_POST['harga'];

	$querySimpan = mysqli_query($koneksi,"INSERT INTO tb_order(nm_order, id_jenis, harga) VALUES ('$nama', '$jenis_order', '$harga')");
	if($querySimpan) {
		echo"<script> alert('Data Order Berhasil Masuk'); window.location = '$admin_url'+'main.php?pages=order'; </script>"; 
	} else {
		echo "<script> alert('Data Order Gagal Masuk'); window.location = '$admin_url'+'main.php?pages=tambah_order';</script>";
	}
	}				
?>