
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Daftar Booking Hotel</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= $admin_url ?>main.php?pages=home">Home</a></li>
              <li class="breadcrumb-item active">Booking</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<div class="col-12">
  <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Tanggal</th>
                    <th>Tanggal Check In</th>
                    <th>Nama Pemesan</th>
                    <th>Alamat</th>
                    <th>No. Telpon</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>               
                  <?php
                            include "../lib/config.php";
                            include "../lib/koneksi.php";
                            $query = mysqli_query($koneksi, "SELECT * FROM tb_pesan order by tgl_pesan");
                            $i=1;
                            while($pesan=mysqli_fetch_array($query)){                              
                          ?>
                    <tr>
                      <td><?= $i ?>.</td>
                      <td><?= date("j/n/Y | H:i",$pesan['tgl_pesan']); ?></td>
                      <td><?= date("j/n/Y | H:i",$pesan['tgl_cekin']); ?></td>
                      <td><?= $pesan['nama'] ?></td>
                      <td><?= $pesan['alamat'] ?></td>
                      <td><?= $pesan['phone'] ?></td>
                      <td>
                            <div class="input-group-btn">
                              <a href="<?= $admin_url; ?>main.php?pages=booking_detail&id_booking=<?= $pesan['id_pesan']; ?>" class="btn btn-primary"><i class="fas fa-home"></i></a>
                              <a href="<?= $admin_url; ?>pages/booking/aksi_hapus.php?id_booking=<?= $pesan['id_pesan']; ?>&no_pesan=<?= $pesan['no_pesan']; ?>" class="btn btn-danger"><i class="fas fa-times"></i></a>
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
            <ul class="nav navbar-right panel_toolbox">
              <div class="input-group-btn float-right">
              <a href="main.php?pages=check_in">
                <button type="button" class="btn btn-primary">Tambah Daftar</button>
              </a>
            </div>                      
            </ul>
            <!-- /.card -->
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
