<?php
include "cok.php";
session_start();
if ($_SESSION['status'] != "login") {
  header("location:index.php?pesan=belum_login");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logos.png" rel="icon">
  <title>SKOI - KALTIM</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Menu -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <img src="img/logo/logos.png">
        </div>
        <div class="sidebar-brand-text mx-3">SKOI-KALTIM</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item ">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Menus
      </div>

      <?php if ($_SESSION['log'] == 'admin') { ?>
        <li class="nav-item ">
          <a class="nav-link" href="siswa.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Siswa</span></a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="pelatih.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Data Pelatih</span></a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="pelatih.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Kontrak Kerja</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true" aria-controls="collapseTable">
            <i class="fas fa-fw fa-table"></i>
            <span>Data Master</span>
          </a>
          <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Master Data</h6>
              <a class="collapse-item" href="norma.php">Norma Penilaian</a>
              <a class="collapse-item" href="kat.php">Kategori Penilaian</a>
              <a class="collapse-item" href="stdnl.php">Standar Penilaian</a>
              <a class="collapse-item" href="cabor.php">Cabang Olahraga</a>
              <a class="collapse-item" href="kla.php">Klasifikasi</a>
            </div>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true" aria-controls="collapsePage">
            <i class="fas fa-fw fa-columns"></i>
            <span>Syncronize</span>
          </a>
          <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Syncronize</h6>
              <a class="collapse-item" href="nil.php">Penilaian</a>
              <a class="collapse-item" href="stdcb.php">Standar Penilaian Per Cabor</a>
            </div>
          </div>
        </li>

      <?php } elseif ($_SESSION['log'] == 'siswa') { ?>
        <li class="nav-item ">
          <a class="nav-link" href="siswa_beranda.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Siswa</span></a>
        </li>
      <?php } elseif ($_SESSION['log'] == 'pelatih') { ?>
        <li class="nav-item ">
          <a class="nav-link" href="siswa.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Siswa</span></a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="peni.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Penilaian</span></a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="reso.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Report Scouting</span></a>
        </li>
      <?php } else { ?>
      <?php } ?>

      <hr class="sidebar-divider">
      <div class="version" id="version-ruangadmin"></div>
    </ul>
    <!-- Menu -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="img/boy.png" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small"><?= $_SESSION['nama']; ?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">