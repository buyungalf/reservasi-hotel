  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Barang Order</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= $admin_url ?>main.php?pages=home">Home</a></li>
              <li class="breadcrumb-item active">Order</li>
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
                <h3 class="card-title">Form Tambah Barang</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="pages/order/aksi_tambah.php" class="form-horizontal">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Barang Order</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama_order" placeholder="Nama Barang Order">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jenis Barang</label>
                    <div class="col-sm-10">
                      <select class="form-control select2" name="jenis_order" style="width: 100%;">
                        <option value="">-- Pilih Jenis Barang --</option>
                        <?php
                          include "../lib/config.php";
                          include "../lib/koneksi.php";
                          $q = mysqli_query($koneksi, "SELECT * FROM tb_order_jenis");
                          while($oj=mysqli_fetch_array($q)){
                        ?>                          
                          <option value="<?php echo $oj['id_jenis_order']; ?>">
                            <?php echo $oj['jenis_order']; ?>
                          </option>
                          <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Harga Barang</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="harga" placeholder="Harga Barang">
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