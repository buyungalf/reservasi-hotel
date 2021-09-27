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
          if ($_GET) {
            $page = $_GET['pages'];
            }
            $username = $_SESSION['username'];
            $realname = $_SESSION['realname'];
            $query = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username='$username'");
            $user = mysqli_fetch_array($query);
          
          
          ?>
        <div class="info">
          <a href="#" class="d-block"><?= $user['realname'] ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
            <a href="main.php?pages=home" class = 'nav-link <?php if ($page == 'home') echo " active"; ?> '>
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home 
              </p>
            </a>            
          </li>
          <li class="nav-header">MAIN</li>
          <li class="nav-item">
            <a href="main.php?pages=booking" class = 'nav-link <?php if ($page == 'booking' OR $page == 'booking_detail') echo " active"; ?> '>
              <i class="nav-icon fas fa-book"></i>
              <p>
                Booking
              </p>
            </a>            
          </li>
          <li class="nav-item">
            <a href="main.php?pages=check_in" class = 'nav-link <?php if ($page == 'check_in') echo " active"; ?> '>
              <i class="nav-icon fas fa-hotel"></i>
              <p>
                Check-in
              </p>
            </a>            
          </li>
          <li class="nav-item">
            <a href="main.php?pages=reservasi" class = 'nav-link <?php if ($page == 'reservasi') echo " active"; ?> '>
              <i class="nav-icon fas fa-suitcase-rolling"></i>
              <p>
                Reservasi
              </p>
            </a>            
          </li>
          <li class="nav-header">MANAGE</li>          
          <li class ='nav-item <?php if ($page == 'user') echo " menu-open"; ?> '>
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Akun
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"> 
                <a href="main.php?pages=user" class = 'nav-link <?php if ($page == 'user') echo " active"; ?> '>
                  <i class="far fa-circle nav-icon"></i>
                  <p>User</p>
                </a>
              </li>          
            </ul>
          </li> 
          <li class ='nav-item <?php if ($page == 'site') echo " menu-open"; ?> '>
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Site
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="main.php?pages=site" class = 'nav-link <?php if ($page == 'site') echo " active"; ?> '>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Site Interface</p>
                </a>
              </li>          
            </ul>
          </li>
          <li class ='nav-item <?php if ($page == 'tipe_kamar' OR $page == 'kamar') echo " menu-open"; ?> '>
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Kamar
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="main.php?pages=tipe_kamar" class = 'nav-link <?php if ($page == 'tipe_kamar') echo " active"; ?> '>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tipe Kamar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="main.php?pages=kamar" class = 'nav-link <?php if ($page == 'kamar') echo " active"; ?> '>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kamar</p>
                </a>
              </li>              
            </ul>
          </li> 
          <li class ='nav-item <?php if ($page == 'order' OR $page == 'jenis_order') echo " menu-open"; ?> '>
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Barang Order
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">              
              <li class="nav-item">
                <a href="main.php?pages=order" class = 'nav-link <?php if ($page == 'order') echo " active"; ?> '>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Order</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="main.php?pages=jenis_order" class = 'nav-link <?php if ($page == 'jenis_order') echo " active"; ?> '>
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