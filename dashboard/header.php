<?php
session_start();

if ($_SESSION['level'] == null) {
  header("location:../index.php?pesan=belumLogin");
}

include '../koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Web SPP</title>
    
    <link href="../assets/startbootstrap-sb-admin-2-gh-pages/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/startbootstrap-sb-admin-2-gh-pages/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../assets/startbootstrap-sb-admin-2-gh-pages/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/css/styles.css">
</head>
<body id="page-top">
	<div id="wrapper">
        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-text mx-3">Aplikasi SPP</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
                </li>
                <?php 
                if ($_SESSION['level'] == 'Admin') {
                ?>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-desktop"></i>
                    <span>Data Master</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="siswa.php">Siswa</a>
                    <a class="collapse-item" href="alumni.php">Alumni</a>
                    <a class="collapse-item" href="kelas.php">Kelas</a>
                    <a class="collapse-item" href="jurusan.php">Jurusan</a>
                    <a class="collapse-item" href="periode.php">Tahun Ajaran</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="kenaikan_kelas.php">
                <i class="fas fa-upload"></i>
                <span>Kenaikan Kelas</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="kelulusan.php">
                <i class="fas fa-graduation-cap"></i>
                <span>Kelulusan</span>
            </a>
        </li>
        <?php }else{ ?>
        <li class="nav-item">
            <a class="nav-link" href="profile.php">
                <i class="fas fa-user"></i>
                <span>Profile</span>
            </a>
        </li>
        <?php } ?>
        <li class="nav-item">
            <a class="nav-link" href="pembayaran.php">
                <i class="fas fa-money-bill"></i>
                <span>Pembayaran</span>
            </a>
        </li>
        <?php 
        if ($_SESSION['level'] == 'Admin') {
        ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true"aria-controls="collapseThree">
                <i class="fas fa-file"></i>
                <span>Laporan</span>
            </a>
            <div id="collapseThree" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="laporan.php">Per Periode</a>
                    <a class="collapse-item" href="rekapitulasi.php">Rekapitulasi</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pengguna.php">
                <i class="fas fa-users"></i>
                <span>Petugas</span>
            </a>
        </li>
        <?php } ?>
        <li class="nav-item">
            <a class="nav-link"  onclick="return confirm('Apakah Anda ingin keluar ?')" href="logout.php">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        </li>
    </ul>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <!-- Sidebar Toggle (Topbar) -->
                <a class="nav-link"id="sidebarToggle" href="#" role="button"><i class="fas fa-bars"></i></a>
                <p class="float-right text-muted mt-2 ml-auto">
                    <?php
                    if ($_SESSION['level'] == 'Siswa') {
                        echo $_SESSION['nama'] . " (Siswa)";
                    }else{
                        echo $_SESSION['username_petugas'] . " (" . $_SESSION['level'] . ")";
                    }
                    ?>
                </p>
            </nav>