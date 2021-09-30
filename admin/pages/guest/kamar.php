  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Guest Order Room</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= $admin_url ?>main.php?pages=home">Home</a></li>
              <li class="breadcrumb-item active">Order Room</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<div class="col-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Daftar Transaksi</h3>
              </div>              
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <tbody>
                    <tr>
                      <th>No</th>
                      <th>No Transaksi</th>
                      <th>Nama kamar</th>
                      <th>Tipe kamar</th>
                      <th>Harga kamar</th>
                      <th>Check-in</th>
                      <th>Check-out</th>
                    </tr>
                  <?php
                    include "../lib/config.php";
                    include "../lib/koneksi.php";
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_trans_tamu a, tb_kamar b, tb_kamar_tipe c where b.tipe = c.id_tipe and b.id_kamar = a.id_kamar");
                    $i=1;
                    while($d=mysqli_fetch_array($query)){
                      $no_trans = $d['no_trans'];
                      $id_tamu = $d['id_tamu'];
                      $id_kamar = $d['id_kamar'];
                      $i_checkin = date("j/n/Y | H:i",$d['checkin']);
                      $i_checkout = date("j/n/Y | H:i",$d['checkout']);
                      $nm_kamar = $d['nm_kamar'];
                  		$tipe_kamar = $d['tipe_kamar'];
		                  $harga = $d['harga'];?>

                    <tr>
                      <td><?= $i ?></td>
                      <td><?= $no_trans ?></td>
                      <td><?= $nm_kamar ?></td>
                      <td><?= $tipe_kamar ?></td>
                      <td><?= $harga ?></td>
                      <td><?= $i_checkin ?></td>
                      <td><?= $i_checkout ?></td>
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