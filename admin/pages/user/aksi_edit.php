<?php 
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
  echo "<center>Untuk mengakses modul, Anda harus login dulu <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$username = $_POST['username'];
	$password = $_POST['password'];
	$status = $_POST['status'];
	$realname = $_POST['realname'];
	$foto = $_POST['foto'];
	$alamat = $_POST['alamat'];
	$phone = $_POST['phone'];

	$querySimpan = mysqli_query($koneksi,"UPDATE tb_user SET username='$usernme', password='$password', status='$status', realname='$realname', foto='$foto', alamat='$alamat', phone='$phone' WHERE id_user='$id_user'");
	if($querySimpan) {
		echo"<script> alert('Data user Berhasil Di ubah'); window.location = '$admin_url'+'main.php?pages=user'; </script>"; 
	} else {
		echo "<script> alert('Data user Gagal Di ubah'); window.location = '$admin_url'+'main.php?pages=edit_user&id_user='+'$id_user';</script>";
	}
	}				
?>