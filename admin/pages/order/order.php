



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Order</h1>
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
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Barang Order</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 20px">#</th>
                      <th>Nama Barang</th>
                      <th>Jenis Barang</th>
                      <th>Harga</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                            include "../lib/config.php";
                            include "../lib/koneksi.php";
                            $query = mysqli_query($koneksi, "SELECT * FROM tb_order a join tb_order_jenis b on a.id_jenis = b.id_jenis_order");
                            $i=1;
                            while($o=mysqli_fetch_array($query)){                              
                          ?>
                    <tr>
                      <td><?= $i ?>.</td>
                      <td><?= $o['nm_order'] ?></td>
                      <td><?= $o['jenis_order'] ?></td>
                      <td><?= $o['harga'] ?></td>
                      <td>
                            <div class="input-group-btn">
                              <a href="<?= $admin_url; ?>main.php?pages=edit_order&id_order=<?= $o['id']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                              <a href="<?= $admin_url; ?>pages/order/aksi_hapus.php?id_order=<?= $o['id']; ?>" class="btn btn-danger"><i class="fas fa-power-off"></i></a>
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
              <a href="main.php?pages=tambah_order">
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
