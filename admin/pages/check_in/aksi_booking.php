<?php
include "../../../lib/config.php";
include "../../../lib/koneksi.php";
if(isset($_POST[booking_new]))
{						
	$tgl_pesan = mktime(date("H"),date("i"),date("s"),date("m"),date("d"),date("Y")); 
	$tgl_checkin = mktime(date("H"),date("i"),date("s"),date("$_POST[required_bln_cekin]"),date("$_POST[required_tgl_cekin]"),date("$_POST[required_thn_cekin]")); 
	$tgl_checkout = mktime(date("H"),date("i"),date("s"),date("$_POST[required_bln_cekout]"),date("$_POST[required_tgl_cekout]"),date("$_POST[required_thn_cekout]"));
	
	$perintah="insert into tb_pesan (tgl_pesan, no_pesan, email, phone, nama, kota, alamat, tgl_cekin, tgl_cekout, id_tipe)
				values ('$tgl_pesan','$_POST[no_pesan]','$_POST[required_email]','$_POST[required_phone]','$_POST[required_nama]','$_POST[required_city]',
				'$_POST[required_alamat]','$tgl_checkin','$tgl_checkout','$_POST[id_tipe]')";

	$berhasil=mysqli_query($koneksi, $perintah) 
		or die ("<SCRIPT> alert('Data tidak masuk database / data telah ada !!'); history.back(); </SCRIPT>");
		if ($berhasil)
		{
			mysqli_query($koneksi,"insert into tb_pesan_kamar (no_pesan, id_kamar) values ('$_POST[no_pesan]','$_POST[id_kamar]')");
			
			$kueri = mysqli_query($koneksi,"select * from tb_kamar where id_kamar = $_POST[id_kamar]");
			while ($data = mysqli_fetch_array($kueri))
			{
				$status = $data['status'];
		
				if ($status == 'free')
				{
					$set_status = ' ';
				}
				
			}
			
			
			mysqli_query($koneksi,"update tb_kamar set status='$set_status' where id_kamar=$_POST[id_kamar]");
			
			header ("location: ../../main.php?pages=check_in");
		}
}
?>