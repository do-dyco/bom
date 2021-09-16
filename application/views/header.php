<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Administrator</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

  <!-- CSS Libraries -->
 <link rel="stylesheet" href="<?php echo base_url();?>assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/components.css">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          
        </form>
        <ul class="navbar-nav navbar-right">
          
          
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?php echo base_url();?>assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, <?=$this->session->userdata('fullname')?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              
              <div class="dropdown-divider"></div>
              <a href="<?=base_url().'login/Logout'?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <img src="<?=base_url().'assets/img/logo.jpg'?>" style="width: 200px; height: 50px">
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">CPL</a>
          </div>
          <ul class="sidebar-menu">
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu" style="display: block;">
              
              <li><a href="<?= base_url('dashboard'); ?>" class="nav-link" ><i class="fas fa-fire"></i> <span>Dashboard</span></a></li><br>
              
             </ul>
           </li>
         </ul>
         <?php if ($this->session->userdata('level') == 2) { ?>
            <li style="display: block; margin-left: 55px"><a href="<?= base_url('hasil_produksi'); ?>" class="nav-link" ><i class="fa fa-check-circle"></i> <span>&nbsp; &nbsp; &nbsp; &nbsp;Hasil Produksi</span></a></li>
          <?php } ?>

          <?php if ($this->session->userdata('level') == 3) { ?>
             <li style="display: block; margin-left: 55px"><a href="<?= base_url('formula'); ?>" class="nav-link" ><i class="fa fa-tint"></i> <span>&nbsp; &nbsp; &nbsp; &nbsp;Formula</span></a></li><br>

             <li style="display: block; margin-left: 55px"><a href="<?= base_url('produksi'); ?>" class="nav-link" ><i class="fa fa-cogs"></i> <span>&nbsp; &nbsp; &nbsp;Produksi</span></a></li><br>

              <li style="display: block; margin-left: 55px"><a href="<?= base_url('hasil_produksi'); ?>" class="nav-link" ><i class="fa fa-check-circle"></i> <span>&nbsp; &nbsp; &nbsp; Hasil Produksi</span></a></li><br>

              <li style="display: block; margin-left: 55px"><a href="<?= base_url('bahan_baku'); ?>" class="nav-link" ><i class="fa fa-cart-arrow-down"></i> <span>&nbsp; &nbsp; &nbsp; Material Masuk</span></a></li><br>

              <li style="display: block; margin-left: 55px"><a href="<?= base_url('stock_produksi'); ?>" class="nav-link" ><i class="fa fa-layer-group"></i> <span>&nbsp; &nbsp; &nbsp; Stock Produksi</span></a></li><br>

              <li style="display: block; margin-left: 55px"><a href="<?= base_url('kirim_produksi'); ?>" class="nav-link" ><i class="fa fa-paper-plane"></i> <span>&nbsp; &nbsp; &nbsp; Kirim Produksi</span></a></li><br>

              <li style="display: block; margin-left: 55px"><a href="<?= base_url('report_produksi'); ?>" class="nav-link" ><i class="far fa-file"></i> <span>&nbsp; &nbsp; &nbsp; Report Produksi</span></a></li>
          <?php } ?>
          
          <?php if ($this->session->userdata('level') == 4) { ?>
            <li style="display: block; margin-left: 55px"><a href="<?= base_url('barang'); ?>" class="nav-link" ><i class="fa fa-cube"></i> <span>&nbsp; &nbsp; &nbsp;&nbsp;Material</span></a></li><br>

             <li style="display: block; margin-left: 55px"><a href="<?= base_url('bahan_baku'); ?>" class="nav-link" ><i class="fa fa-cart-arrow-down"></i> <span>&nbsp; &nbsp; &nbsp; Material Masuk</span></a></li><br>

             <li style="display: block; margin-left: 55px"><a href="<?= base_url('stock_produksi'); ?>" class="nav-link" ><i class="fa fa-layer-group"></i> <span>&nbsp; &nbsp; &nbsp; Stock Produksi</span></a></li><br>

              <li style="display: block; margin-left: 55px"><a href="<?= base_url('kirim_produksi'); ?>" class="nav-link" ><i class="fa fa-paper-plane"></i> <span>&nbsp; &nbsp; &nbsp; Kirim Produksi</span></a></li><br>
          <?php } ?>

          <?php if ($this->session->userdata('level') == 1) { ?>
              <ul class="sidebar-menu">
              <li class="nav-item dropdown ">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-database"></i><span>Master</span></a>
                <ul class="dropdown-menu" style="display: block;">
              
              <li><a href="<?= base_url('barang'); ?>" class="nav-link" ><i class="fa fa-cube"></i> <span>Material</span></a></li>

              <li><a href="<?= base_url('satuan'); ?>" class="nav-link" ><i class="fa fa-tags"></i> <span>Satuan</span></a></li>

              <li><a href="<?= base_url('formula'); ?>" class="nav-link" ><i class="fa fa-tint"></i> <span>Formula</span></a></li>

              <li><a href="<?= base_url('user'); ?>" class="nav-link" ><i class="fa fa-users"></i> <span>Users</span></a></li>
              
             </ul>
           </li>
         </ul>
           <ul class="sidebar-menu">
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-check"></i><span>Transaksi</span></a>
                <ul class="dropdown-menu"style="display: block;">

              <li><a href="<?= base_url('produksi'); ?>" class="nav-link" ><i class="fa fa-cogs"></i> <span>Produksi</span></a></li>

              <li><a href="<?= base_url('hasil_produksi'); ?>" class="nav-link" ><i class="fa fa-check-circle"></i> <span>Hasil Produksi</span></a></li>

              <li><a href="<?= base_url('bahan_baku'); ?>" class="nav-link" ><i class="fa fa-cart-arrow-down"></i> <span>Material Masuk</span></a></li>

              <li><a href="<?= base_url('stock_produksi'); ?>" class="nav-link" ><i class="fa fa-layer-group"></i> <span>Stock Produksi</span></a></li>

              <li><a href="<?= base_url('kirim_produksi'); ?>" class="nav-link" ><i class="fa fa-paper-plane"></i> <span>Kirim Produksi</span></a></li>
              
              </ul>
            </li>
          </ul>

         <ul class="sidebar-menu">
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i><span>Report</span></a>
                <ul class="dropdown-menu" style="display: block;">

            <li><a href="<?= base_url('report_produksi'); ?>" class="nav-link" ><i class="far fa-file"></i> <span>Report Produksi</span></a></li>

            </li>
          </ul>
              
          <?php } ?>
        </aside>
      </div>

