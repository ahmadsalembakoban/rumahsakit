

<?php

require_once "_config/config.php";
require "_assets/libs/vendor/autoload.php";

if( !isset($_SESSION['user'])){
    echo "<script>window.location='".base_url('auth/login.php')."';</script>";
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

                    <title>Aplikasi Rumah Sakit</title>
                    
                    <!-- Bootstrap Core CSS -->
                    <link href="<?=base_url('/_assets/css/bootstrap.min.css')?>" rel="stylesheet">
                    <!-- icon -->
                    <link rel="icon" href="<?=base_url('/_assets/img/icon1.png')?>">
                    <!-- Simple-Sidebar CSS -->     
                    <link href="<?=base_url('/_assets/css/simple-sidebar.css')?>" rel="stylesheet">
                </head>

                <body>

                    <!-- jquery js  -->
                    <script src="<?=base_url('_assets/js/jquery.js');?>"></script>
                    <!-- bootstrap min js -->
                    <script src="<?=base_url('_assets/js/bootstrap.min.js');?>"></script>

                    <div id="wrapper">
                        <!-- Sidebar -->
                        <div id="sidebar-wrapper">
                            <ul class="sidebar-nav">
                                <li class="sidebar-brand">
                                    <a href="#"><span class="text-primary"><b>Rumah Sakit</b></span></a>
                                </li>
                                <li>
                                    <a href="<?=base_url('dashboard')?>">Dashboard</a>
                                </li>
                                <li>
                                    <a href="#">Data Pasien</a>
                                </li>
                                <li>
                                    <a href="<?=base_url('dokter/data.php')?>">Data Dokter</a>
                                </li>
                                <li>
                                    <a href="<?=base_url('poliklinik/data.php')?>">Data Poliklinik</a>
                                </li>
                                <li>
                                    <a href="<?=base_url('obat/data.php')?>">Data Obat</a>
                                </li>
                                <li>
                                    <a href="#">Rekam Medis</a>
                                </li>
                                <li>
                                    <a href="<?=base_url('auth/logout.php')?>"><span class="text-danger"> Logout</span></a>
                                </li>
                            </ul>
                        </div>

                        <div id="page-content-wrapper">
                            <div class="container-fluid">

