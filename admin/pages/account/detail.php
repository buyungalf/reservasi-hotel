



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
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Detail Transaksi Account</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <tbody>
                    <?php
                      include "../lib/config.php";
                      include "../lib/koneksi.php";
                      $query = mysqli_query($koneksi, "SELECT * FROM tb_trans_tamu");
                      while($d=mysqli_fetch_array($query)){                              
                    ?>
                    <div class="card-header">
                      No Trans&ensp;&ensp;&ensp;:&nbsp;<?= $d['no_trans'] ?><br>
                      Nama&nbsp;&ensp;&ensp;&ensp;&ensp;&ensp;:&nbsp;<?= $d['nm_tamu'] ?><br>
                      Alamat&nbsp;&ensp;&ensp;&ensp;&ensp;:&nbsp;<?= $d['alamat'] ?><br>
                      Identitas&ensp;&ensp;&ensp;:&nbsp;<?= $d['identitas'] ?><br>
                      No. ID&nbsp;&ensp;&ensp;&ensp;&ensp;&ensp;:&nbsp;<?= $d['no_id'] ?>
                    </div>
                    <?php } ?> 
                    <?php
                    include "../lib/config.php";
                    include "../lib/koneksi.php";
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_trans_tamu");
                    while($d=mysqli_fetch_array($query)){
                      $id_tamu = $d['id_tamu'];
                      $id_kamar = $d['id_kamar'];
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
		                  $harga = $e['harga'];}

                    //kondisi
                    $lama_sewa = floor((mktime($get_jam_out,$get_menit_out,$get_detik_out,$get_bulan_out,$get_tanggal_out,$get_tahun_out) - mktime($get_jam_in,$get_menit_in,$get_detik_in,$get_bulan_in,$get_tanggal_in,$get_tahun_in))/86400);
                    if ($lama_sewa <=0){
                      $harga_kamar = $harga;
                    }else{
                      $harga_kamar = $harga * $lama_sewa;
                    }?>

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
                      <td><?php echo"$harga" ?></td>
                      <td><?php echo"$i_checkin" ?></td>
                      <td><?php echo"$i_checkout" ?></td>
                      <td><?php echo"$harga_kamar" ?></td>
                    </tr>

                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td><b>Daftar Order</b></td>
                      <td></td>
                      <td></td>
                      <td></td>
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
                      <td><b><?php echo"$no" ?></b></td>
                      <td><b><?php echo"$tgl_order" ?></b></td>
                      <td><b><?php echo"$nm_order" ?></b></td>
                      <td><b><?php echo"$harga" ?></b></td>
                      <td><b>Rp.<?php echo"$banyak" ?></b></td>
                      <td><b><?php echo"$biaya" ?></b></td>
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
                        <td></td>
					            	</tr>";
					          }
				          	?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
    <!-- /.card -->
            </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>