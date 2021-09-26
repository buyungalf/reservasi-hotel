<?php 
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
  echo "<center>Untuk mengakses modul, Anda harus login dulu <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$id_pesan = $_POST['id_pesan'];
	$no_pesan = $_POST['no_pesan'];
	$id_kamar = $_POST['id_kamar'];
	$no_trans = $_POST['no_trans'];
	$nm_tamu = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$telp = $_POST['phone'];
	$identitas = $_POST['identitas'];
	$no_id = $_POST['no_identitas'];
	$disc = $_POST['disc'];
	$keterangan = $_POST['keterangan'];
	$checkin = mktime(date("H"),date("i"),date("s"),date("m"),date("d"),date("Y"));

	$querySimpan = mysqli_query($koneksi,"INSERT INTO tb_tamu(id_kamar, no_trans, nm_tamu, alamat, telp, identitas, no_id, keterangan, diskon, checkin) VALUES ('$id_kamar', '$no_trans', '$nm_tamu', '$alamat', '$telp', '$identitas', '$no_id', '$keterangan', '$disc', '$checkin')");
	if($querySimpan) {
		$queryUpdate = mysqli_query($koneksi, "UPDATE tb_kamar set status='use' where id_kamar='$id_kamar'");
			if($queryUpdate) {
				$queryHapus1 = mysqli_query($koneksi, "DELETE from tb_pesan_kamar where no_pesan = '$no_pesan'");
				if($queryHapus1) {
					$queryHapus2 = mysqli_query($koneksi, "DELETE from tb_pesan where no_pesan = '$no_pesan'");
					echo"<script> alert('Check in Berhasil!'); window.location = '$admin_url'+'main.php?pages=reservasi'; </script>"; 
				} else {
					echo "<script> alert('gagal 1'); window.location = '$admin_url'+'main.php?pages=booking_detail&id_booking=$id_pesan';</script>";
				}
			} else {
					echo "<script> alert('gagal 2'); window.location = '$admin_url'+'main.php?pages=booking_detail&id_booking=$id_pesan';</script>";
			}
		} else {
			echo "<script> alert('Data Gagal Masuk'); window.location = '$admin_url'+'main.php?pages=booking_detail&id_booking=$id_pesan';</script>";
		}
	}				
?>