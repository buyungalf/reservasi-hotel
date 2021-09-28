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
              <li class="breadcrumb-item active">Reservasi</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Tamu Hotel</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th style="width: 20px">#</th>
                      <th>Nama Tamu</th>
                      <th>(Tanggal | Jam) Check-in</th>
                      <th>Nama Kamar</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      include "../lib/config.php";
                      include "../lib/koneksi.php";
                      $query = mysqli_query($koneksi, "SELECT a.id_tamu, a.nm_tamu, a.checkin, b.nm_kamar from tb_tamu a, tb_kamar b where a.id_kamar = b.id_kamar order by a.nm_tamu, a.checkin asc");
                      $i=1;
                      while($tamu=mysqli_fetch_array($query)){                              
                    ?>
                    <tr>
                      <td><?= $i ?>.</td>
                      <td><?= $tamu['nm_tamu'] ?></td>
                      <td><?= date("j F Y | H:i",$tamu['checkin']) ?></td>
                      <td>Kamar <?= $tamu['nm_kamar'] ?></td>
                      <td>
                            <div class="input-group-btn">
                              <a href="<?= $admin_url; ?>main.php?pages=order_tamu&id_tamu=<?= $tamu['id_tamu']; ?>" class="btn btn-success">Shop</i></a>
                              <a href="<?= $admin_url; ?>main.php?pages=check_out&id_tamu=<?= $tamu['id_tamu']; ?>" class="btn btn-danger">Check Out</i></a>
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
