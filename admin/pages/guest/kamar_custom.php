<?php
$tgl = $_GET['tanggal'];
$tgl1 = $_GET['tanggal1']; 
$date = strtotime($_GET['tanggal']);
$date1 = strtotime($_GET['tanggal1']);
?>
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
                <form action="main.php?" method="get">
                  <input type="hidden" name="pages" value="account_custom">
                <div style="display: flex; justify-content: flex-end">
                  <table>
                    <tr>
                      <td align="left">
                        <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdatetime" name="tanggal"/>
                            <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                      </td>
                      <td><div>s/d</div></td>
                      <td align="left">
                        <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdatetime1" name="tanggal1"/>
                            <div class="input-group-append" data-target="#reservationdatetime1" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                      </td>
                    </tr>
                  </table>
                </div>
                <div>
                	<h3 class="card-title">Periode <?= $tgl ?> s/d <?= $tgl1 ?></h3>
                </div>
                <div class="input-group-btn mt-2" style="display: flex; justify-content: flex-end">
                  <button type="submit">Tampilkan </button> 
                </div>
                </form>
              </div>              
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                      <th>No</th>
                      <th>No Transaksi</th>
                      <th>Nama kamar</th>
                      <th>Tipe kamar</th>
                      <th>Harga kamar</th>
                      <th>Check-in</th>
                      <th>Check-out</th>
                    </tr>
                </thead>  
                <tbody>
                  <?php
                    include "../lib/config.php";
                    include "../lib/koneksi.php";
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_trans_tamu a, tb_kamar b, tb_kamar_tipe c where b.tipe = c.id_tipe and b.id_kamar = a.id_kamar and a.checkout BETWEEN $date AND $date1;");
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