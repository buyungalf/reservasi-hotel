<?php 
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
  echo "<center>Untuk mengakses modul, Anda harus login dulu <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$id_tamu = $_POST['id_tamu'];
	$no_trans = $_POST['no_trans'];
	$id_kamar = $_POST['id_kamar'];
	$nm_tamu = $_POST['nm_tamu'];
	$alamat = $_POST['alamat'];
	$telp = $_POST['telp'];
	$identitas = $_POST['identitas'];
	$no_identitas = $_POST['no_identitas'];
	$keterangan = $_POST['keterangan'];
	$diskon = $_POST['diskon'];
	$checkin = $_POST['checkin'];
	$checkout = mktime(date("H"),date("i"),date("s"),date("m"),date("d"),date("Y"));
	$total_tagihan = $_POST['total_tagihan'];

	$tgl = date("j",$checkin);
	$bln = date("n",$checkin);
	$thn = date("Y",$checkin);

	$query = mysqli_query($koneksi, "SELECT * from tb_tamu_order WHERE id_tamu = $id_tamu");
	while($data=mysqli_fetch_array($query)){
	$id_tamu_order_ = $data['id_tamu_order'];
	$id_tamu_ = $data['id_tamu'];
	$tgl_order_ = $data['tgl_order'];
	$id_kamar_ = $data['id_kamar'];
	$id_order_ = $data['id_order'];
	$banyak_ = $data['banyak'];
	$biaya_ = $data['biaya'];}

	$querySimpan = mysqli_query($koneksi,"INSERT into tb_trans_tot (no_trans, tgl_trans, bln_trans, thn_trans, total) values ('$no_trans','$tgl','$bln','$thn','$total_tagihan')");
	if ($querySimpan) 
	{
		$queryInsert = mysqli_query($koneksi, "INSERT into tb_trans_tamu_order SELECT * from tb_tamu_order WHERE id_tamu = $id_tamu");
		if ($queryInsert) 
		{
			$queryHapus1 = mysqli_query($koneksi, "UPDATE tb_kamar set status='free' where id_kamar=$id_kamar");
			if ($queryHapus1) 
			{
				$queryInsert2 = mysqli_query($koneksi, "INSERT into tb_trans_tamu (id_tamu, no_trans, id_kamar, nm_tamu, alamat, telp, identitas, no_id, keterangan, diskon, checkin, checkout) values ('$id_tamu','$no_trans','$id_kamar','$nm_tamu','$alamat','$telp','$identitas','$no_identitas','$keterangan','$diskon','$checkin','$checkout')");
				if ($queryInsert2) {
					$queryHapus2 = mysqli_query($koneksi, "DELETE from tb_tamu_order where id_tamu = $id_tamu");
					if ($queryHapus2) {
						$queryHapus3 = mysqli_query($koneksi, "DELETE from tb_tamu where id_tamu = $id_tamu");
						if ($queryHapus3) 
						{
							echo "<script> alert('Checkout berhasil'); window.location = '$admin_url'+'./pages/account/cetak.php?no_trans=$no_trans','_blank';</script>";
						} else {
							echo"<script> alert('Data Gagal dihapus 3'); window.location = '$admin_url'+'main.php?pages=check_out&id_tamu=$id_tamu'; </script>";
						}
					} else {				
						echo"<script> alert('Data Gagal dihapus 2'); window.location = '$admin_url'+'main.php?pages=check_out&id_tamu=$id_tamu'; </script>";
					}
				} else {
					echo"<script> alert('Data Gagal diinsert 2'); window.location = '$admin_url'+'main.php?pages=check_out&id_tamu=$id_tamu'; </script>";
				}
			} else {
				echo"<script> alert('Data Gagal dihapus 1'); window.location = '$admin_url'+'main.php?pages=check_out&id_tamu=$id_tamu'; </script>";
			}
		} else{
			echo"<script> alert('Data Gagal diinsert 1'); window.location = '$admin_url'+'main.php?pages=check_out&id_tamu=$id_tamu'; </script>";
		}			
	} else {
			echo "<script> alert('Checkout gagal'); window.location = '$admin_url'+'main.php?pages=reservasi';</script>";
	}

}				
?>