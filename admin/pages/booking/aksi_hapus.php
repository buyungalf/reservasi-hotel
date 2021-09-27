<?php 
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
  echo "<center>Untuk mengakses modul, Anda harus login dulu <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$id_booking=$_GET['id_booking'];
   $no_pesan=$_GET['no_pesan'];
	$queryHapus = mysqli_query($koneksi, "DELETE FROM tb_pesan WHERE id_pesan='$id_booking'");
   $queryHapus2 = mysqli_query($koneksi, "DELETE FROM tb_pesan_kamar WHERE no_pesan='$no_pesan'");

	if($queryHapus){
      if($queryHapus2){
         echo "<script> alert('Data booking Berhasil Di hapus'); window.location = '$admin_url'+'main.php?pages=booking';</script>";
      }else{
         echo "<script> alert('Data booking Gagal Di hapus karena kamar'); window.location = '$admin_url'+'main.php?pages=booking';</script>";
      }
    } else {
       echo "<script> alert('Data booking Gagal Di hapus'); window.location = '$admin_url'+'main.php?pages=booking';</script>"; 
    }
}
?>