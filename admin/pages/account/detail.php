



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Detail Account</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= $admin_url ?>main.php?pages=home">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= $admin_url ?>main.php?pages=account">Account</a></li>
              <li class="breadcrumb-item active">Detail Account</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<div class="col-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Detail Transaksi Account</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                  <?php
                      $no_trans = $_GET['no_trans'];
                      include "../lib/config.php";
                      include "../lib/koneksi.php";
                      $query = mysqli_query($koneksi, "SELECT * FROM tb_trans_tamu where no_trans = '$no_trans'");
                      while($d=mysqli_fetch_array($query)){  
                        $no_trans_ = $d['no_trans'];
                        $nm_tamu_ = $d['nm_tamu'];
                        $alamat_ = $d['alamat'];
                        $identitas_ = $d['identitas'];
                        $no_id_ = $d['no_id'];
                        $id_tamu_ = $d['id_tamu'];?>
                        
                    <div class="card-header">
                      No Trans&ensp;&ensp;&ensp;:&nbsp;<?php echo"$no_trans_" ?><br>
                      Nama&nbsp;&ensp;&ensp;&ensp;&ensp;&ensp;:&nbsp;<?php echo"$nm_tamu_" ?><br>
                      Alamat&nbsp;&ensp;&ensp;&ensp;&ensp;:&nbsp;<?php echo"$alamat_" ?><br>
                      Identitas&ensp;&ensp;&ensp;:&nbsp;<?php echo"$identitas_" ?><br>
                      No. ID&nbsp;&ensp;&ensp;&ensp;&ensp;&ensp;:&nbsp;<?php echo"$no_id_" ?>
                    </div>
                    <?php } ?> 
                    <?php
                    include "../lib/config.php";
                    include "../lib/koneksi.php";
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_trans_tamu where id_tamu = $id_tamu_");
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
		                  $harga = $e['harga'];}

                    //kondisi
                    $lama_sewa = floor((mktime($get_jam_out,$get_menit_out,$get_detik_out,$get_bulan_out,$get_tanggal_out,$get_tahun_out) - mktime($get_jam_in,$get_menit_in,$get_detik_in,$get_bulan_in,$get_tanggal_in,$get_tahun_in))/86400);
                    if ($lama_sewa <=0){
                      $harga_kamar = $harga;
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
                    }?>
                    <table  class="table">
                    <h2>Data Kamar</h2>
                    <tr>
                      <th>Nama kamar</th>
                      <th>Tipe kamar</th>
                      <th>Harga kamar</th>
                      <th>Check-in</th>
                      <th>Check-out</th>
                      <th>Total</th>
                    </tr>

                    <tr>
                      <td><?php echo"$nm_kamar" ?></td>
                      <td><?php echo"$tipe_kamar" ?></td>
                      <td>Rp. <?= number_format($harga,0,',','.'); ?></td>
                      <td><?php echo"$i_checkin" ?></td>
                      <td><?php echo"$i_checkout" ?></td>
                      <td>Rp. <?= number_format($harga_kamar,0,',','.'); ?></td>
                    </tr>
                    </table><br>

                    <table  class="table">
                    <h2>Data Tambahan</h2>
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
                      <td>Rp. <?= number_format($harga,0,',','.'); ?></td>
                      <td><?php echo"$banyak" ?></td>
                      <td>Rp. <?= number_format($biaya,0,',','.'); ?></td>
                    </tr>
					
					          <?php }
                    if ($no < 1 )
					          {					
					          echo"<tr>
                        <td></td>
                        <td></td>
                        <td></td>
				            		<td><div>Tidak Ada Order </div></td>
                        <td></td>
                        <td></td>
					            	</tr>";
					          }
				          	?>
                    </table><br>

                    <?php
                    $kueri1 = mysqli_query($koneksi, "SELECT SUM(biaya) FROM tb_trans_tamu_order where id_tamu = $id_tamu_");
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

                    <table  align="right">
                    <tr>
                      <td>TOTAL ORDER </td>
                      <td>= Rp.<b><?= number_format($tot_order,0,',','.'); ?></b> </td>
                    </tr>
                    <tr>
                      <td>DISKON KAMAR (<b><?php echo"$diskon"?></b> %) </td>
                      <td>= Rp.<b><?= number_format($tot_diskon,0,',','.'); ?></b></td>
                    </tr>
                    <tr>
                      <td>TOTAL TAGIHAN </td>
                      <td>= Rp.<b><?= number_format($tot_tagihan,0,',','.'); ?></b></td>
                    </tr>
                    </table><br><br>
              </div>
                <div class="card-body d-flex justify-content-center">
                  <a href="./pages/account/cetak.php?no_trans=<?php echo"$no_trans_" ?>"  target='_blank'>
                    <button class="btn btn-secondary float-right">CETAK</button>
                  </a>
                </div>
              <!-- /.card-body -->
            </div>
    <!-- /.card -->
            </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
