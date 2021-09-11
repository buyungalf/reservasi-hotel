<?php 
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
  echo "<center>Untuk mengakses modul, Anda harus login dulu <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$menu = $_POST['menu'];
	$isi_menu = $_POST['isi_menu'];

	$querySimpan = mysqli_query($koneksi,"UPDATE tb_manag_site SET isi_menu='$isi_menu' WHERE menu='$menu'");
	if($querySimpan) {
		echo"<script> alert('Data site Berhasil Di ubah'); window.location = '$admin_url'+'main.php?pages=site'; </script>"; 
	} else {
		echo "<script> alert('Data site Gagal Di ubah'); window.location = '$admin_url'+'main.php?pages=edit_site&menu='+'$menu';</script>";
	}
	}				
?>