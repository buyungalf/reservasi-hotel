



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Check In</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= $admin_url ?>main.php?pages=home">Home</a></li>
              <li class="breadcrumb-item active">Check In</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Kamar</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 20px">#</th>
                      <th>Nama Kamar</th>
                      <th>Tipe Kamar</th>
                      <th>Fasilitas</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                            include "../lib/config.php";
                            include "../lib/koneksi.php";
                            $query = mysqli_query($koneksi, "SELECT * FROM tb_kamar a join tb_kamar_tipe b on a.tipe = b.id_tipe ORDER BY a.status asc");
                            $i=1;
                            while($k=mysqli_fetch_array($query)){                              
                          ?>
                    <tr>
                      <td><?= $i ?>.</td>
                      <td>Kamar <?= $k['nm_kamar'] ?></td>
                      <td><?= $k['tipe_kamar'] ?></td>
                      <td><?= $k['fasilitas'] ?></td>
                      <td><?= $k['status'] ?></td>
                      <td>
                        <div class="input-group-btn">
                          <a href="<?= $admin_url; ?>main.php?pages=form_booking&id_kamar=<?= $k['id_kamar']; ?>" class="btn btn-primary">Booking</a>
                          <a href="<?= $admin_url; ?>main.php?pages=form_checkin&id_kamar=<?= $k['id_kamar']; ?>" class="btn btn-success">Check-in</a>
                        </div>
                      </td>
                    </tr>
                    <?php $i++;} ?> 
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
