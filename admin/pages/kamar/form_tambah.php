  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Kamar</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= $admin_url ?>main.php?pages=home">Home</a></li>
              <li class="breadcrumb-item active">Kamar</li>
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
                <h3 class="card-title">Form Tambah Kamar</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="pages/kamar/aksi_tambah.php" class="form-horizontal">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Kamar</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nm_kamar" placeholder="Nama kamar">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Fasilitas</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="fasilitas" placeholder="Fasilitas kamar">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="status" placeholder="Status kamar">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tipe Kamar</label>
                    <div class="col-sm-10">
                    <select name="tipe_kamar" class="form-control select2" style="width: 100%;">
                      <option selected="selected">-- Pilih tipe kamar --</option>
                      <?php
                        include "../lib/config.php";
                        include "../lib/koneksi.php";
                        $q = mysqli_query($koneksi, "SELECT * FROM tb_kamar_tipe");
                        while($tipe=mysqli_fetch_array($q)){
                      ?>                          
                      <option value="<?php echo $tipe['id_tipe']; ?>">
                        <?php echo $tipe['tipe_kamar']; ?>
                      </option>
                      <?php } ?>
                    </select>
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