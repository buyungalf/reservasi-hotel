  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Reservasi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= $admin_url ?>main.php?pages=home">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= $admin_url ?>main.php?pages=reservasi">Reservasi</a></li>
              <li class="breadcrumb-item active">Check-out</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="col-12">
<!-- Horizontal Form -->
            <div class="card card-info">  
            <div class="card-header">
              <h3 class="card-title">Order Tamu Hotel</h3>
            </div>           
              <!-- /.card-header -->
                <?php                  
                  include "../lib/config.php";
                  include "../lib/koneksi.php";
                  $id_tamu = $_GET['id_tamu'];
                  $query = mysqli_query($koneksi, "SELECT * from tb_tamu a JOIN tb_kamar b ON a.id_kamar = b.id_kamar JOIN tb_kamar_tipe c ON b.tipe = c.id_tipe WHERE a.id_tamu = '$id_tamu'");
                  $co=mysqli_fetch_array($query);
                  $i=1; 

                  $harga1 = $co['harga'];  
                  $no_trans = $co['no_trans'];   
                  $get_tanggal = date("j",$co['checkin']);
                  $get_bulan = date("n",$co['checkin']);
                  $get_tahun = date("Y",$co['checkin']);
                  $get_jam = date("H",$co['checkin']);
                  $get_menit = date("i",$co['checkin']);
                  $get_detik = date("s",$co['checkin']);
                  
                  $get_jam_skr = date("H");
                  $get_menit_skr = date("i");
                  $get_detik_skr = date("s");
                  
                  $get_13 = date("H",13);
                  $get_15 = date("H",15);
                  $get_17 = date("H",17);
                  
                  $i_checkin = $co['checkin'];
                  $tgl = date("j",$i_checkin);
                  $bln = date("n",$i_checkin);
                  $thn = date("Y",$i_checkin);
                  
                  //kondisi
                  $lama_sewa = floor((mktime(date("H"),date("i"),date("s"),date("m"),date("d"),date("Y")) - mktime($get_jam,$get_menit,$get_detik,$get_bulan,$get_tanggal,$get_tahun))/86400);
                  
                  if ($lama_sewa <= 0)
                  {
                    $harga_kamar = $harga1; 
                  }
                  else
                  {
                    if ($get_jam_skr >= $get_13 | $get_jam_skr <= $get_15)
                    {
                      $harga_kamar = ($harga1 + ((25/100) * $harga1)) * $lama_sewa;
                    }
                    else if ($get_jam_skr > $get_15 | $get_jam_skr <= $get_17)
                    {
                      $harga_kamar = ($harga1 + ((50/100) * $harga1)) * $lama_sewa;
                    }
                    else if ($get_jam_skr < $get_17)
                    {
                      $harga_kamar = $harga1 * $lama_sewa;
                    }   
                  }                     
                ?>
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">No. Trans</label>
                    <div class="col-sm-10">
                      <label class="col-form-label"><?= $co['no_trans'] ?></label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Tamu</label>
                    <div class="col-sm-10">
                      <label class="col-form-label"><?= $co['nm_tamu'] ?></label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                      <label class="col-form-label"><?= $co['alamat'] ?></label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Identitas</label>
                    <div class="col-sm-10">
                      <label class="col-form-label"><?= $co['identitas'] ?></label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">No. Identitas</label>
                    <div class="col-sm-10">
                      <label class="col-form-label"><?= $co['no_id'] ?></label>
                    </div>
                  </div>
                </div>
                <div class="card-body p-0">
                <form method="post" action="pages/reservasi/aksi_checkout.php" class="form-horizontal">
                <input type="hidden" name="id_tamu" value="<?= $co['id_tamu'] ?>">
                <input type="hidden" name="no_trans" value="<?= $co['no_trans'] ?>">
                <input type="hidden" name="id_kamar" value="<?= $co['id_kamar'] ?>">
                <input type="hidden" name="nm_tamu" value="<?= $co['nm_tamu'] ?>">
                <input type="hidden" name="alamat" value="<?= $co['alamat'] ?>">
                <input type="hidden" name="telp" value="<?= $co['telp'] ?>">
                <input type="hidden" name="identitas" value="<?= $co['identitas'] ?>">
                <input type="hidden" name="no_identitas" value="<?= $co['no_id'] ?>">
                <input type="hidden" name="keterangan" value="<?= $co['keterangan'] ?>">
                <input type="hidden" name="diskon" value="<?= $co['diskon'] ?>">
                <input type="hidden" name="checkin" value="<?= $co['checkin'] ?>">
                <h3 style="text-align: center"><b>Detail Transaksi</b></h3>
                <table class="table mb-2">
                  <thead>
                    <tr>
                      <th>Nama Kamar</th>
                      <th>Tipe Kamar</th>
                      <th>Harga Kamar</th>
                      <th>Check-in</th>
                      <th>Check-out</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>                    
                    <tr>
                      <td><?= $co['nm_kamar'] ?></td>
                      <td><?= $co['tipe_kamar'] ?></td>
                      <td>Rp. <?= number_format($co['harga'],0,',','.'); ?></td>
                      <td><?= date("j F Y | H:i",$co['checkin']) ?></td>
                      <td><?= date("j F Y | H:i") ?></td>
                      <td>Rp. <?= number_format($harga_kamar,0,',','.'); ?></td>
                    </tr>
                  </tbody>
                </table>
                </div>
                <div class="card-body p-0">
                <table class="table" >
                  <thead>
                    <tr>
                      <th style="width: 20px">#</th>
                      <th>(Tanggal | Jam) Order</th>
                      <th>Nama Order</th>
                      <th>Harga</th>
                      <th>Qty</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      include "../lib/config.php";
                      include "../lib/koneksi.php";

                      $id_tamu = $_GET['id_tamu'];

                      $query = mysqli_query($koneksi, "SELECT * from tb_tamu a JOIN  tb_tamu_order b ON a.id_tamu = b.id_tamu JOIN tb_order c ON b.id_order = c.id WHERE a.id_tamu = $id_tamu order by b.tgl_order desc");
                      $i=1;
                      $total_order = 0;
                      
                      while($to=mysqli_fetch_array($query)){                              
                    ?>
                      <input type="hidden" name="id_tamu_order" value="<?= $to['id_tamu_order'] ?>">
                      <input type="hidden" name="id_order" value="<?= $to['id_order'] ?>">
                      <input type="hidden" name="tgl_order" value="<?= $to['tgl_order'] ?>">
                      <input type="hidden" name="banyak" value="<?= $to['banyak'] ?>">
                      <input type="hidden" name="biaya" value="<?= $to['biaya'] ?>">
                    <tr>
                      <td><?= $i ?>.</td>
                      <td><?= date("j F Y | H:i",$to['tgl_order']) ?></td>
                      <td><?= $to['nm_order'] ?></td>
                      <td>Rp. <?= number_format($to['harga'],0,',','.'); ?></td>
                      <td><?= $to['banyak'] ?></td>
                      <td>Rp. <?= number_format($to['biaya'],0,',','.'); ?></td>
                    </tr>
                    <?php 
                    $i++;
                    $total_order += $to['biaya'];
                    } 

                    $tot_diskon = ($co['diskon']/100) * $harga1;
                    $total_tagihan = ($harga_kamar + $total_order) - $tot_diskon;

                    ?> 
                  </tbody>
                </table>
                </div>
              </div>   
              <div class="row invoice-info">
                <div class="col-sm-9 invoice-col">
                </div>
                <!-- /.col -->
                <div class=" invoice-col mb-3 mt-3 ">
                  <b>Total Order :</b> Rp. <?= number_format($total_order,0,',','.') ?><br>
                  <b>Diskon Kamar :</b> <?= $co['diskon'] ?>%<br>
                  <b>Total Tagihan :</b> Rp. <?= number_format($total_tagihan,0,',','.') ?>
                  <input type="hidden" name="total_tagihan" value="<?= $total_tagihan ?>">
                </div>          
            </div>  

            <div class="card-body d-flex justify-content-center">
              <a href="">
                  <button type="submit" class="btn btn-success float-right">Check Out</button>
                </a>
            </div>
            </form>
            <!-- /.card -->
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>