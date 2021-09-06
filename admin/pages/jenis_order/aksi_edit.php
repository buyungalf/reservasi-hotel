<?php 
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
  echo "<center>Untuk mengakses modul, Anda harus login dulu <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$id_jenis_order = $_POST['id_jenis_order'];
	$nama = $_POST['nama_jenis_order'];

	$querySimpan = mysqli_query($koneksi,"UPDATE tb_order_jenis SET jenis_order='$nama' WHERE id_jenis_order='$id_jenis_order'");
	if($querySimpan) {
		echo"<script> alert('Data Jenis Order Berhasil Di ubah'); window.location = '$admin_url'+'main.php?pages=jenis_order'; </script>"; 
	} else {
		echo "<script> alert('Data Jenis Order Gagal Di ubah'); window.location = '$admin_url'+'main.php?pages=edit_jenis_order&id_jenis_order='+'$id_jenis_order';</script>";
	}
	}				
?>