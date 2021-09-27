



  <!-- Content Wrapper. Contains page content -->
  <?php												
		$tot_kamar=0;
		$kueri = "select id_kamar from tb_kamar";
		$proses = mysqli_query($koneksi, $kueri);
		while ($data = mysqli_fetch_array($proses))
		{						
		$tot_kamar++;
		}
											
		$tot_kamar_dipakai=0;
		$kueri = "select id_kamar from tb_kamar where status = 'use'";
		$proses = mysqli_query($koneksi, $kueri);
		while ($data = mysqli_fetch_array($proses))
		{						
		$tot_kamar_dipakai++;
		}
											
		$tot_kamar_kosong=0;
		$kueri = "select id_kamar from tb_kamar where status <> 'use'";
		$proses = mysqli_query($koneksi, $kueri);
		while ($data = mysqli_fetch_array($proses))
		{						
		$tot_kamar_kosong++;
		}
	?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo"$tot_kamar" ?></h3>

                <p>Total Kamar</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo"$tot_kamar_dipakai" ?></sup></h3>

                <p>Kamar Dipakai</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo"$tot_kamar_kosong" ?></h3>

                <p>Kamar Kosong</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-stalker"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  