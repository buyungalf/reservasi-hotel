  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="asset/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="asset/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          
        </div>
        <?php
          include "../lib/config.php";
          include "../lib/koneksi.php";
          $username = $_SESSION['username'];
          $realname = $_SESSION['realname'];
          $query = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username='$username'");
          $user = mysqli_fetch_array($query);
          ?>
        <div class="info">
          <a href="#" class="d-block"><?= $user['realname'] ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">MAIN</li>
          <li class="nav-item menu-open">
            <a href="main.php?pages=home" class="nav-link active">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Beranda
              </p>
            </a>            
          </li>
          <li class="nav-item">
            <a href="main.php?pages=booking" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Booking
              </p>
            </a>
          </li>
          <li class="nav-header">MANAGE</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Akun
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="main.php?pages=user" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User</p>
                </a>
              </li>          
            </ul>
          </li> 
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Kamar
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="main.php?pages=tipe_kamar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tipe Kamar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="main.php?pages=kamar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kamar</p>
                </a>
              </li>              
            </ul>
          </li> 
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Barang Order
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">              
              <li class="nav-item">
                <a href="main.php?pages=order" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Order</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="main.php?pages=jenis_order" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jenis Order</p>
                </a>
              </li>              
            </ul>
          </li>         
          <li class="nav-header">SETTINGS</li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Log Out
              </p>
            </a>
          </li>          
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>