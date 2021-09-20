



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Account</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= $admin_url ?>main.php?pages=home">Home</a></li>
              <li class="breadcrumb-item active">Account</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Transaksi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 20px">#</th>
                      <th>Tanggal</th>
                      <th>No Transaksi</th>
                      <th>Total Pemasukan</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    include "../lib/config.php";
                    include "../lib/koneksi.php";
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_trans_tamu");
                    $i=1;
                    while($d=mysqli_fetch_array($query)){
                      $no_trans = $d['no_trans'];
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
		                  $harga = $e['harga'];}

                    //kondisi
                    $lama_sewa = floor((mktime($get_jam_out,$get_menit_out,$get_detik_out,$get_bulan_out,$get_tanggal_out,$get_tahun_out) - mktime($get_jam_in,$get_menit_in,$get_detik_in,$get_bulan_in,$get_tanggal_in,$get_tahun_in))/86400);
                    if ($lama_sewa <=0){
                      $harga_kamar = $harga;
                    }else{
                      $harga_kamar = $harga * $lama_sewa;
                    }?>
                    <?php										
					          $no=0;
					          $tot_biaya = 0;
					          $kueri = mysqli_query($koneksi,"select b.tgl_order, c.nm_order, c.harga, b.banyak, b.biaya from tb_trans_tamu_order b, tb_order c where b.id_order = c.id and b.id_tamu = $id_tamu order by b.tgl_order desc");
					          while ($data = mysqli_fetch_array($kueri)){
					          $harga = $data['harga'];
					          $biaya = $data['biaya'];						
					          $no++;?>
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
                    <tr>
                      <td><?= $i ?>.</td>
                      <td><?php echo"$i_checkout" ?></td>
                      <td><?php echo"$no_trans" ?></td>
                      <td><?php echo"$tot_tagihan" ?></td>
                      <td>
                        <div class="input-group-btn">
                          <a href="<?= $admin_url; ?>main.php?pages=detail_account&no_trans=<?= $no_trans; ?>" class="btn btn-secondary"> DETAIL </a>
                        </div>
                      </td>
                    </tr>
                    <?php $i++;} ?> 
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
