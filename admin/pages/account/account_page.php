  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Account</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= $admin_url ?>main.php?pages=home">Home</a></li>
              <li class="breadcrumb-item active">Account</li>
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
                        <div>
                          <b>
                            <select name="bln_awal" size="1" id="bln" class="formSelect">
                              <?php
                                if($act=="edit"){
                                  echo"<option value=\"$msk[$bulan]\" selected>$bln[$bulan]</option>";
                                }
                              ?>
                              <option value="01">Januari</option>
                              <option value="02">Pebruari</option>
                              <option value="03">Maret</option>
                              <option value="04">April</option>
                              <option value="05">Mei</option>
                              <option value="06">Juni</option>
                              <option value="07">Juli</option>
                              <option value="08">Agustus</option>
                              <option value="09">September</option>
                              <option value="10">Oktober</option>
                              <option value="11">Nopember</option>
                              <option value="12">Desember</option>
                            </select>
                            <select name="thn_awal" size="1" id="thn" class="formSelect">
                              <?php
                                $th=date("Y");
                                if($act=="edit"){
                                  echo"<option value=\"$mulai[2]\" selected>$mulai[2]</option>";
                                }
                                for($s=$th;$s<=$th+1;$s++){
                                  echo"<option value=\"$s\">$s</option>";
                                }
                              ?>
                            </select>
                          </b>
                        </div>
                      </td>
                    </tr>
                  </table>
                  <h3 class="card-title mx-2">s/d</h3>
                  <table>
                    <tr>
                      <td align="left">
                        <div>
                          <b>
                            <select name="bln_akhir" size="1" id="bln" class="formSelect">
                              <?php
                                if($act=="edit"){
                                  echo"<option value=\"$msk[$bulan]\" selected>$bln[$bulan]</option>";
                                }
                              ?>
                              <option value="01">Januari</option>
                              <option value="02">Pebruari</option>
                              <option value="03">Maret</option>
                              <option value="04">April</option>
                              <option value="05">Mei</option>
                              <option value="06">Juni</option>
                              <option value="07">Juli</option>
                              <option value="08">Agustus</option>
                              <option value="09">September</option>
                              <option value="10">Oktober</option>
                              <option value="11">Nopember</option>
                              <option value="12">Desember</option>
                            </select>
                            <select name="thn_akhir" size="1" id="thn" class="formSelect">
                              <?php
                                $th=date("Y");
                                if($act=="edit"){
                                  echo"<option value=\"$mulai[2]\" selected>$mulai[2]</option>";
                                }
                                for($s=$th;$s<=$th+1;$s++){
                                  echo"<option value=\"$s\">$s</option>";
                                }
                              ?>
                            </select>
                          </b>
                        </div>
                      </td>
                    </tr>
                  </table>
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
                      <th style="width: 20px">#</th>
                      <th>Tanggal</th>
                      <th>No Transaksi</th>
                      <th>Total Pemasukan</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      include "../lib/config.php";
                      include "../lib/koneksi.php";

                      $query = mysqli_query($koneksi, "SELECT * FROM tb_trans_tot");
                      $i=1;
                      while($a=mysqli_fetch_array($query)){                              
                    ?>

                    <tr>
                      <td><?= $i ?>.</td>
                      <td><?= $a['tgl_trans'] ?>/<?= $a['bln_trans'] ?>/<?= $a['thn_trans'] ?></td>
                      <td><?= $a['no_trans'] ?></td>
                      <td><?= $a['total'] ?></td>
                      <td>
                        <div class="input-group-btn">
                          <a href="<?= $admin_url; ?>main.php?pages=detail_account&no_trans=<?= $a['no_trans']; ?>" class="btn btn-secondary"> DETAIL </a>
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