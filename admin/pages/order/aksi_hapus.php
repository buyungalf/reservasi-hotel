<?php 
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
  echo "<center>Untuk mengakses modul, Anda harus login dulu <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$id_order=$_GET['id_order'];
	$queryHapus = mysqli_query($koneksi, "DELETE FROM tb_order WHERE id='$id_order'");

	if($queryHapus){
       echo "<script> alert('Data Order Berhasil Di hapus'); window.location = '$admin_url'+'main.php?pages=order';</script>";
    } else {
       echo "<script> alert('Data Order Gagal Di hapus'); window.location = '$admin_url'+'main.php?pages=order';</script>"; 
    }
}
?>