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
              <li class="breadcrumb-item"><a href="<?= $admin_url ?>main.php?pages=reservasi">Booking</a></li>
              <li class="breadcrumb-item active">Detail</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="col-12">
<!-- Horizontal Form -->
            <form method="post" action="pages/booking/aksi_checkin.php" class="form-horizontal">
            <div class="card card-info">  
            <div class="card-header">
              <h3 class="card-title">Daftar Kamar Pesanan</h3>
            </div>           
              <!-- /.card-header -->
                <?php                  
                  include "../lib/config.php";
                  include "../lib/koneksi.php";
                  $id_booking = $_GET['id_booking'];
                  $query = mysqli_query($koneksi, "SELECT * from tb_pesan d join tb_pesan_kamar a
                                                  on d.no_pesan = a.no_pesan join tb_kamar b 
                                                  on a.id_kamar = b.id_kamar 
                                                  join tb_kamar_tipe c 
                                                  on b.tipe = c.id_tipe WHERE id_pesan= $id_booking");
                  $bo=mysqli_fetch_array($query);
                  $tgl = mktime(date("H"),date("i"),date("s"),date("m"),date("d"),date("Y")); 
                  $no_trans = date("00jnYHis",$tgl);
                  $i=1;                           
                ?>
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">No. Pemesanan</label>
                    <div class="col-sm-10">
                      <label class="col-form-label"><?= $bo['no_pesan'] ?></label>
                      <input type="hidden" name="no_pesan" value="<?= $bo['no_pesan'] ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">No. Transaksi</label>
                    <div class="col-sm-10">
                      <label class="col-form-label">CI/<?= $no_trans ?></label>
                      <input type="hidden" name="no_trans" value="CI/00<?= $no_trans ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Kamar</label>
                    <div class="col-sm-10">
                      <label class="col-form-label"><?= $bo['nm_kamar'] ?></label>
                      <input type="hidden" name="id_kamar" value="<?= $bo['id_kamar'] ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Waktu Check-in</label>
                    <div class="col-sm-10">
                      <label class="col-form-label"><?= date("j/n/Y | H:i",$bo['tgl_pesan']); ?></label>
                      <input type="hidden" name="id_pesan" value="<?= $bo['id_pesan'] ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Pemesan</label>
                    <div class="col-sm-10">
                      <label class="col-form-label"><?= $bo['nama'] ?></label>
                      <input type="hidden" name="nama" value="<?= $bo['nama'] ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Identitas</label>
                    <div class="col-sm-10">
                      <select class="form-control select2" name="identitas" style="width: 100%;">
                        <option value="">-- Pilih Kartu Identitas --</option>
                        <?php
                          include "../lib/config.php";
                          include "../lib/koneksi.php";
                          $q = mysqli_query($koneksi, "SELECT * FROM tb_identitas");
                          while($id=mysqli_fetch_array($q)){
                        ?>                          
                          <option value="<?php echo $id['id_jenis']; ?>">
                            <?php echo $id['jenis']; ?>
                          </option>
                          <?php } ?>
                      </select>
                    </div>
                  </div> 
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">No. Identitas</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="no_identitas" placeholder="No. Identitas">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                      <label class="col-form-label"><?= $bo['alamat'] ?></label>
                      <input type="hidden" name="alamat" value="<?= $bo['alamat'] ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                      <label class="col-form-label"><?= $bo['phone'] ?></label>
                      <input type="hidden" name="phone" value="<?= $bo['email'] ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Disc</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="disc" placeholder="Discount">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="keterangan" placeholder="Keterangan">
                    </div>
                  </div>
                </div>         
                <!-- /.card-body -->
                <div class="card-footer">
                  <button class="btn btn-default float-right ml-2">Batal</button>
                  <button type="submit" class="btn btn-info float-right">Check In</button>                  
                </div>
                <!-- /.card-footer -->
              </form>
              </div>              
            </div>
            <!-- /.card -->
                    </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>