<?php
require_once "koneksi.php";
if (!isset($_SESSION['user'])) {
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Aplikasi Akademik</title>


    <link href="<?=base_url('_assets/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?=base_url('_assets/css/simple-sidebar.css');?>" rel="stylesheet">


</head>
<body>
    <script src="<?=base_url('_assets/js/jquery.js');?>"></script>
    <script src="<?=base_url('_assets/js/bootstraps.min.js');?>"></script>
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="<?=base_url('dashboard')?>"><span class="text-primary">Akademik</span></a>
                </li>
                <li>
                    <a href="<?=base_url('mahasiswa/mahasiswa.php')?>">Data Mahasiswa</a>
                </li>
                <li>
                    <a href="<?=base_url('jurusan/jurusan.php')?>">Data Jurusan</a>
                </li>
                <li>
                    <a href="<?=base_url('dosen/dosen.php')?>">Data Dosen</a>
                </li>
                <li>
                    <a href="<?=base_url('matkul/matkul.php')?>">Data Mata Kuliah</a>
                </li>
                <li>
                    <a href="<?=base_url('nilai/nilai.php')?>">Data Nilai</a>
                </li>
                <li>
                    <a href="<?=base_url('auth/logout.php')?>"><span class="text-danger">Logout</span></a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
  

                
                   
