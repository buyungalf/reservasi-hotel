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
              <li class="breadcrumb-item active">Shop</li>
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
                  $query = mysqli_query($koneksi, "SELECT * from tb_tamu a join tb_kamar b on a.id_kamar = b.id_kamar having a.id_tamu = '$id_tamu' order by a.nm_tamu, a.checkin asc");
                  $to=mysqli_fetch_array($query);
                  $i=1;                           
                ?>
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Tamu</label>
                    <div class="col-sm-10">
                      <label class="col-form-label"><?= $to['nm_tamu'] ?></label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">(Tanggal | Jam) Check in</label>
                    <div class="col-sm-10">
                      <label class="col-form-label"><?= date("j F Y | H:i",$to['checkin']) ?></label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Kamar</label>
                    <div class="col-sm-10">
                      <label class="col-form-label"><?= $to['nm_kamar'] ?></label>
                    </div>
                  </div>
                </div>
                <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 20px">#</th>
                      <th>(Tanggal | Jam) Order</th>
                      <th>Nama Order</th>
                      <th>Harga</th>
                      <th>Qty</th>
                      <th>Total</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      include "../lib/config.php";
                      include "../lib/koneksi.php";
                      $query = mysqli_query($koneksi, "SELECT * from tb_tamu a JOIN  tb_tamu_order b ON a.id_tamu = b.id_tamu JOIN tb_order c ON b.id_order = c.id WHERE a.id_tamu = $id_tamu order by b.tgl_order desc");
                      $i=1;
                      $id_tamu = $to['id_tamu'];
                      while($to=mysqli_fetch_array($query)){                              
                    ?>
                    <tr>
                      <td><?= $i ?>.</td>
                      <td><?= date("j F Y | H:i",$to['tgl_order']) ?></td>
                      <td><?= $to['nm_order'] ?></td>
                      <td>Rp. <?= number_format($to['harga'],2,',','.'); ?></td>
                      <td><?= $to['banyak'] ?></td>
                      <td>Rp. <?= number_format($to['biaya'],2,',','.'); ?></td>
                      <td>
                        <div class="input-group-btn">
                          <a href="<?= $admin_url; ?>pages/reservasi/aksi_hapus.php?id_tamu_order=<?= $to['id_tamu_order']; ?>&id_tamu=<?= $to['id_tamu'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i></i></a>
                        </div>
                      </td>
                    </tr>
                    <?php $i++;} ?> 
                  </tbody>
                </table>
              </div>
              <div class="card-footer">
                  <a href="<?= $admin_url; ?>main.php?pages=tambah_order_tamu&id_tamu=<?= $id_tamu ?>" class="btn btn-info float-right">Tambah</a>                    
                </div>
            </div>
            <!-- /.card -->
                    </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>