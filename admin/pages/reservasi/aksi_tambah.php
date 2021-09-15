<?php 
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
  echo "<center>Untuk mengakses modul, Anda harus login dulu <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$tgl_order = mktime(date("H"),date("i"),date("s"),date("m"),date("d"),date("Y"));
	$id_tamu = $_POST['id_tamu'];
	$id_kamar = $_POST['id_kamar'];
	$id_order = $_POST['id_order'];
	$qty = $_POST['qty'];

	$query = "SELECT * from tb_order where id = '$id_order'";
	$q = mysqli_query($koneksi, "SELECT * FROM tb_order where id = '$id_order'");
    while($o=mysqli_fetch_array($q)){
		$harga = $o['harga'];
	}
	
	$biaya = $harga * $qty;

	$querySimpan = mysqli_query($koneksi,"INSERT INTO tb_tamu_order(id_tamu, id_kamar, tgl_order, id_order, banyak, biaya) VALUES ('$id_tamu', '$id_kamar', '$tgl_order', '$id_order', '$qty', '$biaya')");
	if($querySimpan) {
		echo "<script> alert('Data Order Berhasil Di tambah'); window.location = '$admin_url'+'main.php?pages=order_tamu&id_tamu='+'$id_tamu';</script>";
    } else {
       echo "<script> alert('Data Order Gagal Di tambah'); window.location = '$admin_url'+'main.php?pages=order_tamu&id_tamu='+'$id_tamu';</script>"; 
    }
}				
?>