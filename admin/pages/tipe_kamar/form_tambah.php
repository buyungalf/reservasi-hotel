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
                <h3 class="card-title">Form Tambah Tipe Kamar</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="pages/tipe_kamar/aksi_tambah.php" class="form-horizontal">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tipe Kamar</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="tipe_kamar" placeholder="Tipe kamar">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Harga Kamar</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="harga" placeholder="Harga kamar">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Foto Kamar</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="pict" placeholder="Foto kamar">
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