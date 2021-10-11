  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Guest Order Extra</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= $admin_url ?>main.php?pages=home">Home</a></li>
              <li class="breadcrumb-item active">Order Extra</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<div class="col-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Daftar Transaksi</h3>
                <form action="main.php?" method="get">
                  <input type="hidden" name="pages" value="order_custom">
                <div style="display: flex; justify-content: flex-end">
                  <table>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="tanggal"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                  </table>
                </div>
                <div class="input-group-btn mt-2" style="display: flex; justify-content: flex-end">
                  <button type="submit">Tampilkan </button> 
                </div>
                </form>
              </div>              
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Tamu</th>
                      <th>Nama kamar</th>
                      <th>Tanggal Order</th>
                      <th>Nama Order</th>
                      <th>Harga Order</th>
                      <th>Jumlah</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    include "../lib/config.php";
                    include "../lib/koneksi.php";
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_trans_tamu_order a, tb_trans_tamu b, tb_kamar c, tb_order d where a.id_tamu = b.id_tamu and a.id_kamar = c.id_kamar and a.id_order = d.id");
                    $i=1;
                    while($d=mysqli_fetch_array($query)){
                      $nm_tamu = $d['nm_tamu'];
                      $nm_kamar = $d['nm_kamar'];
                      $tgl_order = date("j/n/Y | H:i",$d['tgl_order']);
                      $nm_order = $d['nm_order'];
                      $harga = $d['harga'];
                      $banyak = $d['banyak'];
                      $biaya = $d['biaya'];?>

                    <tr>
                      <td><?= $i ?></td>
                      <td><?= $nm_tamu ?></td>
                      <td><?= $nm_kamar ?></td>
                      <td><?= $tgl_order ?></td>
                      <td><?= $nm_order ?></td>
                      <td><?= $harga ?></td>
                      <td><?= $banyak ?></td>
                      <td><?= $biaya ?></td>
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