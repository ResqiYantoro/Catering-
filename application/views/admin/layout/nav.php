<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
          <!-- menu dasbor -->
        <li><a href="<?php echo base_url('admin/dasbor') ?>"><i class="fa fa-dashboard text-aqua"></i> <span>DASHBOARD</span></a></li>\
      

        <!-- Tabel menu    -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-sitemap"></i> <span>MENU</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/menu') ?>"><i class="fa fa-table"></i> DATA MENU </a></li>
            <li><a href="<?php echo base_url('admin/menu/tambah') ?>"><i class="fa fa-plus"></i> TAMBAH MENU MAKANAN</a></li>
             <li><a href="<?php echo base_url('admin/kategori') ?>"><i class="fa fa-tags"></i>KATEGORI MENU</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dollar"></i> <span>TRANSAKSI</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/transaksi') ?>"><i class="fa fa-table"></i> DATA TRANSAKSI </a></li>
            <li><a href="<?php echo base_url('admin/transaksi/histori')  ?>"><i class="fa fa-tasks"></i> HISTORI TRANSAKSI </a></li>
            <li><a href="<?php echo base_url('admin/transaksi/laporan') ?>"><i class="fa fa-print"></i> LAPORAN TRANSAKSI </a></li>
          </ul>
        </li>
        

      <!-- menu user   -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-lock"></i> <span>PENGGUNA</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/user') ?>"><i class="fa fa-table"></i> DATA PElANGGAN</a></li>
          </ul>
        </li>
        
            <!-- menu konfigurasi   -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-wrench  "></i> <span>KONFIGURASI</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/konfigurasi') ?>"><i class="fa fa-home"></i> Konfigurasi Umum</a></li>
            <li><a href="<?php echo base_url('admin/konfigurasi/logo') ?>"><i class="fa fa-image"></i> Konfigurasi Logo</a></li>
            <li><a href="<?php echo base_url('admin/konfigurasi/icon') ?>"><i class="fa fa-home"></i> Konfigurasi icon</a></li>
          </ul>
        </li>
          </ul>
      
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    
