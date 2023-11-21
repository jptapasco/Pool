<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <!-- <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul> -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li id="custom-controls">
        
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php 
                if ($this->session->userdata('rol') === 'admin') {
                  echo "/billar/index.php/DashboardAdmin";
                } else if ($this->session->userdata('rol') === 'cajero') {
                  echo "/billar/index.php/DashboardCajero";
                }else{
                
                }
              ?>" class="brand-link">
      <img src="<?php echo base_url() ?>/assets/dist/img/icons8-mesa-de-billar-96.png" alt="Billar Logo" class="brand-image">
      <span class="brand-text font-weight-light">InovaByte</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url() ?>/assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
          <?php
            $rol = $this->session->userdata('rol');
            $nombre = $this->session->userdata('nombres');
            if ($nombre != null && $rol === 'admin') {
                echo $nombre;
            }else if($nombre != null && $rol === 'cajero'){
                echo $nombre;
            }else{
                echo "Error";
            }
          ?></a>
          <span class="text-primary"><?php 
            $rol = $this->session->userdata('rol');
            if ($rol === 'admin') {
                echo "Admin";
            }else if($rol === 'cajero'){
                echo "Cajero";
            }else{
                echo "Error";
            }
          ?></span>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="pl-3">
              <ul class="list-unstyled">
                <li class="d-sm-block mb-2">
                  <a href="#"><i class="fa-solid fa-user-gear"></i> Perfil</a>
                </li>
                <li class="d-sm-block mb-2">
                  <a href="<?php echo site_url('Login/logOut') ?>"><i class="fa-solid fa-right-from-bracket"></i> Cerrar sesión</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
<hr class="bg-gray">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo site_url('Inicio/listar') ?>" class="nav-link">
              <i class="fa-solid fa-house nav-icon"> </i> 
              <p>Inicio</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('Usuarios/listado') ?>" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Usuarios</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('Clientes/listado') ?>" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Clientes</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('Inventarios/listado') ?>" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Inventario</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('Productos/listado') ?>" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Productos</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <div class="content-wrapper">
</nav>