  <?php
  $_waktu = date("Y-m-d");

  $_tahun = substr($_waktu,0,4);
  $_bulan = substr($_waktu,5,2);
  $_tanggal = substr($_waktu,8,2);
  if ($_waktu != "0000-00-00"){
    $_hari_en =date("D", mktime(0,0,0,$_bulan, $_tanggal, $_tahun));
    $hari_en = array("Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat");
    $hari_id=array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat", "Sabtu");
    $bulan_en = array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12");	
    $bulan_id = array("Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agst", "Sept", "Okt", "Nov", "Des");
    $_hari_id = str_replace($hari_en, $hari_id, $_hari_en);
    $_bulan_id = str_replace($bulan_en, $bulan_id, $_bulan);
    $_tgl = $_hari_id.", ".$_tanggal." ".$_bulan_id." ".$_tahun;
    $tglX = $_tgl;
  } else {
    $tglX = "-";
  }
  $_jam = date("H:i");
  $tglX .= "&nbsp&nbsp;|&nbsp;&nbsp;".$_jam;
  $tanggal = $_tgl;
  $tgl_jam = $tglX;
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Booking</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= $admin_url ?>main.php?pages=home">Home</a></li>
              <li class="breadcrumb-item active">Daftar Kamar</li>
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
                <h3 class="card-title">Form Booking</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="pages/check_in/aksi_booking.php" class="form-horizontal">
                <?php
                  include "../lib/config.php";
                  include "../lib/koneksi.php";
                  $id_kamar = $_GET['id_kamar'];
                  $query = mysqli_query($koneksi, "SELECT * FROM tb_kamar a join tb_kamar_tipe b on a.tipe = b.id_tipe where a.id_kamar='$id_kamar'");
                  $k=mysqli_fetch_array($query);
                  $tglp = mktime(date("H"),date("i"),date("s"),date("m"),date("d"),date("Y")); 
                  $no_pesan = date("00jnYHis",$tglp);
                  $nm_kamar = $k['nm_kamar'];	
                  $id_tipe = $k['id_tipe'];
                  $tipe_kamar = $k['tipe_kamar'];
                ?>
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                      <label class="col-form-label"><?php echo"$tanggal" ?></label>
                    </div>
                  </div>                  
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">No. Pemesanan</label>
                    <div class="col-sm-10">
                      <b><?php echo"REC-$no_pesan" ?></b>
                      <input name="no_pesan" type="hidden" value="<?php echo"REC-$no_pesan" ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Pemesan</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="required_nama" placeholder="Nama Pemesan">
                    </div>
                  </div> 
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email Pemesan</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="required_email" placeholder="Email Pemesan">
                    </div>
                  </div> 
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="required_phone" placeholder="Nomor Handphone">
                    </div>
                  </div> 
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">City</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="required_city" placeholder="Kota">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                      <textarea name="required_alamat" class="form-control" rows="3" placeholder="Alamat"></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tgl Check-in</label>
                    <div class="col-sm-10">
                      <table>
                        <tr>
                          <td align="left"><div><b>
                          <div class="input-group date" id="reservationdate" data-target-input="nearest">
                              <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="tanggal" placeholder="DD-MM-YYYY"/>
                              <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                          </div>
                          </b></div></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tgl Check-out</label>
                    <div class="col-sm-10">
                      <table>
                      <tr>
                          <td align="left"><div><b>
                          <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                              <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate1" name="tanggal1" placeholder="DD-MM-YYYY"/>
                              <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                          </div>
                          </b></div></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tipe Kamar</label>
                    <div class="col-sm-10">
                      <label class="col-form-label"><?= $k['tipe_kamar'] ?></label>
                      <input name="id_tipe" type="hidden" value="<?php echo"$id_tipe" ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">No. Kamar</label>
                    <div class="col-sm-10">
                      <label class="col-form-label"><?= $k['nm_kamar'] ?></label>
                      <input type="hidden" name="id_kamar" value="<?php echo"$id_kamar" ?>" />
                    </div>
                  </div>  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                <button type="submit" name="booking_new" value="Booking" class="btn btn-info float-right">Booking</button>
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