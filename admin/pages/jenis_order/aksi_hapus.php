<?php 
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
  echo "<center>Untuk mengakses modul, Anda harus login dulu <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$id_jenis_order=$_GET['id_jenis_order'];
	$queryHapus = mysqli_query($koneksi, "DELETE FROM tb_order_jenis WHERE id_jenis_order='$id_jenis_order'");

	if($queryHapus){
       echo "<script> alert('Data Jenis Order Berhasil Di hapus'); window.location = '$admin_url'+'main.php?pages=jenis_order';</script>";
    } else {
       echo "<script> alert('Data Jenis Order Gagal Di hapus'); window.location = '$admin_url'+'main.php?pages=jenis_order';</script>"; 
    }
}
?>