



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tipe Kamar</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= $admin_url ?>main.php?pages=home">Home</a></li>
              <li class="breadcrumb-item active">Tipe Kamar</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Tipe Kamar</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 20px">#</th>
                      <th>Nama Tipe Kamar</th>
                      <th>Harga</th>
                      <th>Foto</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      include "../lib/config.php";
                      include "../lib/koneksi.php";
                      $query = mysqli_query($koneksi, "SELECT * FROM tb_kamar_tipe ");
                      $i=1;
                      while($kt=mysqli_fetch_array($query)){                              
                    ?>
                    <tr>
                      <td><?= $i ?>.</td>
                      <td><?= $kt['tipe_kamar'] ?></td>
                      <td><?= $kt['harga'] ?></td>
                      <td><img src="asset/<?= $kt['pict'] ?>"></td>
                      <td>
                        <div class="input-group-btn">
                          <a href="<?= $admin_url; ?>main.php?pages=edit_tipe_kamar&id_tipe_kamar=<?= $kt['id_tipe']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                          <a href="<?= $admin_url; ?>pages/tipe_kamar/aksi_hapus.php?id_order=<?= $kt['id_tipe']; ?>" class="btn btn-danger"><i class="fas fa-power-off"></i></a>
                        </div>
                      </td>
                    </tr>
                    <?php $i++;} ?> 
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <ul class="nav navbar-right panel_toolbox">
            <div class="input-group-btn float-right">
              <a href="main.php?pages=tambah_tipe_kamar">
                <button href="index.php" type="button" class="btn btn-primary">Tambah Daftar</button>
              </a>
            </div>                      
            </ul>
    <!-- /.card -->
            </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
