<?php 
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
  echo "<center>Untuk mengakses modul, Anda harus login dulu <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$tipe_kamar = $_POST['tipe_kamar'];
	$harga = $_POST['harga'];
	$pict = $_POST['pict'];

	$querySimpan = mysqli_query($koneksi,"INSERT INTO tb_kamar_tipe(tipe_kamar, harga, pict) VALUES ('$tipe_kamar', '$harga', '$pict')");
	if($querySimpan) {
		echo"<script> alert('Data tipe kamar Berhasil Masuk'); window.location = '$admin_url'+'main.php?pages=tipe_kamar'; </script>"; 
	} else {
		echo "<script> alert('Data tipe kamar Gagal Masuk'); window.location = '$admin_url'+'main.php?pages=tambah_tipe_kamar';</script>";
	}
	}				
?>