<?php
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";
    $query = mysqli_query($koneksi, "SELECT * FROM tb_trans_tamu");
    while($d=mysqli_fetch_array($query)){
        $no_trans = $d['no_trans'];
        $nm_tamu = $d['nm_tamu'];
        $alamat = $d['alamat'];
        $identitas = $d['identitas'];
        $no_id = $d['no_id'];}
    $query = mysqli_query($koneksi, "SELECT * FROM tb_trans_tamu");
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
      $get_detik_out = date("s",$d['checkout']);}
    
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
      $harga_kamar = $harga_k * $lama_sewa;
    }
    $no=0;
    $tot_biaya = 0;
    $kueri = mysqli_query($koneksi,"select b.tgl_order, c.nm_order, c.harga, b.banyak, b.biaya from tb_trans_tamu_order b, tb_order c where b.id_order = c.id and b.id_tamu = $id_tamu order by b.tgl_order desc");
    while ($data = mysqli_fetch_array($kueri)){
    $tgl_order = date("j/n/Y | H:i",$data['tgl_order']);
    $nm_order = $data['nm_order'];
    $harga = $data['harga'];
    $banyak = $data['banyak'];
    $biaya_ = $data['biaya'];						
    $no++;}
?>
<?php
    $kueri1 = mysqli_query($koneksi, "SELECT SUM(biaya) FROM tb_trans_tamu_order");
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

<?php

require_once __DIR__ . './vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$cetak = '<div class="card">
              <div class="card-header">
                <h1 class="card-title">Detail Transaksi Account</h1>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                    <p>
                      No Trans&ensp;&ensp;&ensp;:&nbsp;'.$no_trans.'<br>
                      Nama &nbsp;&ensp;&ensp;&ensp;&ensp;&ensp;:&nbsp;'.$nm_tamu.'<br>
                      Alamat &nbsp;&ensp;&ensp;&ensp;&ensp;:&nbsp;'.$alamat.'<br>
                      Identitas&ensp;&ensp;&ensp;:&nbsp;'.$identitas.'<br>
                      No. ID&nbsp;&ensp;&ensp;&ensp;&ensp;&ensp;:&nbsp;'.$no_id.'
                    </p>
                <h2>Order Kamar</h2>
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
                      <td>'.$nm_kamar.'</td>
                      <td>'.$tipe_kamar.'</td>
                      <td>Rp.'.$harga_k.'</td>
                      <td>'.$i_checkin.'</td>
                      <td>'.$i_checkout.'</td>
                      <td>Rp.'.$harga_kamar.'</td>
                    </tr>
                </table>

                <h2>Order Tambahan</h2>

                <table border="1" cellpadding="10" cellspacing="0">
                    <tr>
                      <td><b>No</b></td>
                      <td><b>Tanggal Order</b></td>
                      <td><b>Nama Order</b></td>
                      <td><b>Harga</b></td>
                      <td><b>Jumalah</b></td>
                      <td><b>Total</b></td>
                    </tr>
                     
                    <tr>
                      <td>'.$no.'</td>
                      <td>'.$tgl_order.'</td>
                      <td>'.$nm_order.'</td>
                      <td>Rp.'.$harga.'</td>
                      <td>'.$banyak.'</td>
                      <td>Rp.'.$biaya_.'</td>
                    </tr>
                </table><br>

                <table align="right">
                    <tr>
                      <td>TOTAL ORDER </td>
                      <td>= Rp.<b>'.$tot_order.'</b> </td>
                    </tr>
                    <tr>
                      <td>DISKON KAMAR (<b>'.$diskon.'</b> %) </td>
                      <td>= Rp.<b>'.$tot_diskon.'</b></td>
                    </tr>
                    <tr>
                      <td>TOTAL TAGIHAN </td>
                      <td>= Rp.<b>'.$tot_tagihan.'</b></td>
                    </tr>
                </table>
              </div>';
$mpdf->WriteHTML($cetak);
$mpdf->Output('Detail_Transaksi_Account.pdf', 'I');

?>