  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Booking</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= $admin_url ?>main.php?pages=home">Home</a></li>
              <li class="breadcrumb-item active">Daftar Kamar</li>
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
                <h3 class="card-title">Form Booking</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="pages/daftar_kamar/aksi_checkin.php" class="form-horizontal">
                <?php
                  include "../lib/config.php";
                  include "../lib/koneksi.php";
                  $id_kamar = $_GET['id_kamar'];
                  $query = mysqli_query($koneksi, "SELECT * FROM tb_kamar a join tb_kamar_tipe b on a.tipe = b.id_tipe where a.id_kamar='$id_kamar'");
                  $k=mysqli_fetch_array($query);
                  $tglp = mktime(date("H"),date("i"),date("s"),date("m"),date("d"),date("Y")); 
                  $no_pesan = date("00jnYHis",$tglp);
                ?>
                <div class="card-body">               
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">No. Transaksi</label>
                    <div class="col-sm-10">
                      <label class="col-form-label">CI/001292021200850</label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Kamar / Tipe Kamar</label>
                    <div class="col-sm-10">
                      <label class="col-form-label">2A / VIP Room A</label>
                    </div>
                  </div> 
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Waktu Check in</label>
                    <div class="col-sm-10">
                      <label class="col-form-label">Minggu, 12 Sept 2021  |  20:08</label>
                    </div>
                  </div> 
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Tamu</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama_order" placeholder="Nama Tamu">
                    </div>
                  </div> 
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Identitas</label>
                    <div class="col-sm-10">
                      <select class="form-control select2" name="jenis_order" style="width: 100%;">
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
                      <input type="text" class="form-control" name="nama_order" placeholder="No. Identitas">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Alamat Tamu</label>
                    <div class="col-sm-10">
                      <textarea name="alamat" class="form-control" rows="3" placeholder="Alamat"></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Telp Tamu</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama_order" placeholder="Telp Tamu">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Disc </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama_order" placeholder="Disc">
                    </div>
                  </div> 
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Keterangan </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama_order" placeholder="Keterangan">
                    </div>
                  </div>   
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                	<button class="btn btn-default float-right ml-2">Batal</button>
                  <button type="submit" class="btn btn-info float-right">Tambah</button>
                  
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->
                    </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>