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
                  $query = mysqli_query($koneksi, "SELECT * from tb_tamu b JOIN tb_kamar c ON b.id_kamar = c.id_kamar WHERE b.id_tamu = $id_tamu");
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
              </div>             
            </div>
            <!-- /.card -->
                    </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>