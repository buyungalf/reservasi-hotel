<?php
    $no_trans = $_GET['no_trans'];
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";
    $query = mysqli_query($koneksi, "SELECT * FROM tb_trans_tamu where no_trans = '$no_trans'");
    while($d=mysqli_fetch_array($query)){
        $no_trans_ = $d['no_trans'];
        $nm_tamu = $d['nm_tamu'];
        $alamat = $d['alamat'];
        $identitas = $d['identitas'];
        $no_id = $d['no_id'];}
    $query = mysqli_query($koneksi, "SELECT * FROM tb_trans_tamu where no_trans = '$no_trans'");
    while($d=mysqli_fetch_array($query)){
      $id_tamu = $d['id_tamu'];
      $id_kamar = $d['id_kamar'];
      $diskon = $d['diskon'];
      $i_checkin = date("j/n/Y | H:i",$d['checkin']);
      $i_checkout = date("j/n/Y | H:i",$d['checkout']);
      
      $get_tanggal_in = date("j",$d['checkin']);
      $get_bulan_in = date("n",$d['checkin']);
      $get_tahun_in = date("Y",$d['checkin']);
      $get_jam_in = date("H",$d['checkin']);
      $get_menit_in = date("i",$d['checkin']);
      $get_detik_in = date("s",$d['checkin']);
      
      $get_tanggal_out = date("j",$d['checkout']);
      $get_bulan_out = date("n",$d['checkout']);
      $get_tahun_out = date("Y",$d['checkout']);
      $get_jam_out = date("H",$d['checkout']);
      $get_menit_out = date("i",$d['checkout']);
      $get_detik_out = date("s",$d['checkout']);
    
      $get_13 = date("H",13);
      $get_15 = date("H",15);
      $get_17 = date("H",17);}
    
    $query1 = mysqli_query($koneksi, "SELECT a.nm_kamar, b.tipe_kamar, b.harga from tb_kamar a, tb_kamar_tipe b where a.tipe = b.id_tipe and id_kamar = $id_kamar");
    while($e=mysqli_fetch_array($query1)){
      $nm_kamar = $e['nm_kamar'];
          $tipe_kamar = $e['tipe_kamar'];
          $harga_k = $e['harga'];}

    //kondisi
    $lama_sewa = floor((mktime($get_jam_out,$get_menit_out,$get_detik_out,$get_bulan_out,$get_tanggal_out,$get_tahun_out) - mktime($get_jam_in,$get_menit_in,$get_detik_in,$get_bulan_in,$get_tanggal_in,$get_tahun_in))/86400);
    if ($lama_sewa <=0){
      $harga_kamar = $harga_k;
    }else{
      if ($get_jam_out >= $get_13 | $get_jam_out <= $get_15)
      {
        $harga_kamar = ($harga + ((25/100) * $harga)) * $lama_sewa;
      }
      else if ($get_jam_out > $get_15 | $get_jam_out <= $get_17)
      {
        $harga_kamar = ($harga + ((50/100) * $harga)) * $lama_sewa;
      }
      else if ($get_jam_out > $get_17)
      {
        $harga_kamar = $harga * $lama_sewa;
      }
    }
?>
<?php
    $kueri1 = mysqli_query($koneksi, "SELECT SUM(biaya) FROM tb_trans_tamu_order where id_tamu = $id_tamu");
    while ($c = mysqli_fetch_array($kueri1))
    {
    $biaya = $c['SUM(biaya)'];
    }
    
    if ($biaya <= 0)
    {
      $tot_order = 0;
    }
    else
      $tot_order = $biaya;
    
    $tot_diskon = ($diskon/100) * $harga;
    $tot_tagihan = ($harga_kamar + $tot_order) - $tot_diskon;
    ?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  </head>
  <body>
  '<div class="card">
              <div class="card-header">
                <h1 class="card-title">INVOICE</h1>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                    <p>
                      No Trans&ensp;&ensp;&ensp;:&nbsp;<?php echo"$no_trans_" ?><br>
                      Nama &nbsp;&ensp;&ensp;&ensp;&ensp;&ensp;:&nbsp;<?php echo"$nm_tamu" ?><br>
                      Alamat &nbsp;&ensp;&ensp;&ensp;&ensp;:&nbsp;<?php echo"$alamat"?><br>
                      Identitas&ensp;&ensp;&ensp;:&nbsp;<?php echo"$identitas"?><br>
                      No. ID&nbsp;&ensp;&ensp;&ensp;&ensp;&ensp;:&nbsp;<?php echo"$no_id"?>
                    </p>
                <h2>Data Kamar</h2>
                <table border="1" cellpadding="10" cellspacing="0">
                    <tr>
                      <td><b>Nama kamar</b></td>
                      <td><b>Tipe kamar</b></td>
                      <td><b>Harga kamar</b></td>
                      <td><b>Check-in</b></td>
                      <td><b>Check-out</b></td>
                      <td><b>Total</b></td>
                    </tr>
                    <tr>
                      <td><?php echo"$nm_kamar"?></td>
                      <td><?php echo"$tipe_kamar"?></td>
                      <td><?= number_format($harga_k,2,',','.'); ?></td>
                      <td><?php echo"$i_checkin"?></td>
                      <td><?php echo"$i_checkout"?></td>
                      <td><?= number_format($harga_kamar,2,',','.'); ?></td>
                    </tr>
                </table>
                <h2>Data Tambahan</h2>
                <table border="1" cellpadding="10" cellspacing="0">
                    <tr>
                      <td><b>No</b></td>
                      <td><b>Tanggal Order</b></td>
                      <td><b>Nama Order</b></td>
                      <td><b>Harga</b></td>
                      <td><b>Jumalah</b></td>
                      <td><b>Total</b></td>
                    </tr>
                     
                    <?php										
					          $no=0;
					          $tot_biaya = 0;
					          $kueri = mysqli_query($koneksi,"select b.tgl_order, c.nm_order, c.harga, b.banyak, b.biaya from tb_trans_tamu_order b, tb_order c where b.id_order = c.id and b.id_tamu = $id_tamu order by b.tgl_order desc");
					          while ($data = mysqli_fetch_array($kueri)){
					          $tgl_order = date("j/n/Y | H:i",$data['tgl_order']);
					          $nm_order = $data['nm_order'];
					          $harga = $data['harga'];
					          $banyak = $data['banyak'];
					          $biaya = $data['biaya'];						
					          $no++;?>
					 
                    <tr>
                      <td><?php echo"$no" ?></td>
                      <td><?php echo"$tgl_order" ?></td>
                      <td><?php echo"$nm_order" ?></td>
                      <td><?= number_format($harga,2,',','.'); ?></td>
                      <td><?php echo"$banyak" ?></td>
                      <td><?= number_format($biaya,2,',','.'); ?></td>
                    </tr>
					
					          <?php }?>
                </table><br>
                <table align="right">
                    <tr>
                      <td>TOTAL ORDER </td>
                      <td>= Rp.<b><?= number_format($tot_order,2,',','.'); ?></b> </td>
                    </tr>
                    <tr>
                      <td>DISKON KAMAR (<b><?php echo"$diskon"?></b> %) </td>
                      <td>= Rp.<b><?= number_format($tot_diskon,2,',','.'); ?></b></td>
                    </tr>
                    <tr>
                      <td>TOTAL TAGIHAN </td>
                      <td>= Rp.<b><?= number_format($tot_tagihan,2,',','.'); ?></b></td>
                    </tr>
                </table>
              </div>'
  </body>
  </html>

<?php

require_once __DIR__ . './vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$cetak = ob_get_contents();
ob_clean();
$mpdf->WriteHTML($cetak);
$mpdf->Output('Detail_Transaksi_Account.pdf', 'I');

?>