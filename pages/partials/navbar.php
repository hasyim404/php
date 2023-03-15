<?php

$sesi = $_SESSION['PETUGAS']

?>
<div id="top-bar" class="top-bar">

    <!--/ Container end -->
</div>
<!--/ Topbar end -->
<!-- Header start -->
<header id="header" class="header-two bg-dark">
    <div class="site-navigation">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-dark p-0">

                        <div class="logo">
                            <a class="d-block" href="index.php">
                                <img loading="lazy" src="public/img/logo/logo3.png" alt="Constra">
                                <!-- <p>iVentory</p> -->
                            </a>
                        </div><!-- logo end -->

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <!-- Request page for navbar active css -->
                        <?php $p = $_REQUEST['page'] ?>

                        <div id="navbar-collapse" class="collapse navbar-collapse">
                            <ul class="nav navbar-nav ml-auto align-items-center">
                                <li class="nav-item <?= ($p == 'pages/home') ? 'active' : ''; ?>">
                                    <a href="index.php?page=pages/home" class="nav-link">Home</a>
                                </li>

                                <li class="nav-item <?= ($p == 'pages/about') ? 'active' : ''; ?>">
                                    <a href="index.php?page=pages/about" class="nav-link">About Us</a>
                                </li>

                                <li class="nav-item"><a class="nav-link <?= ($p == 'pages/about') ? 'active' : ''; ?>" href="index.php?page=pages/contact">Contact</a></li>
                                <!-- Logic Login -->
                                <?php if (!isset($sesi)) { // Gagal/belum Login 
                                ?>
                                    <li class="header-get-a-quote ml-auto">
                                        <a class="btn btn-primary" href="index.php?page=pages/login">Login</a>
                                    </li>

                                <?php } else { // Berhasil Login 
                                    $check_url =
                                        $p == 'pages/barang/view' ||
                                        $p == 'pages/barang/view_detail' ||
                                        $p == 'pages/barang/form' ||
                                        $p == 'pages/peminjaman/view' ||
                                        $p == 'pages/peminjaman/view_detail' ||
                                        $p == 'pages/peminjaman/form' ||
                                        $p == 'pages/karyawan/view' ||
                                        $p == 'pages/karyawan/view_detail' ||
                                        $p == 'pages/karyawan/form' ||
                                        $p == 'pages/supplier/view' ||
                                        $p == 'pages/supplier/view_detail' ||
                                        $p == 'pages/supplier/form' ||
                                        $p == 'pages/kategori/view'
                                        ? 'active' : '';

                                    $check_url_master =
                                        $p == 'pages/kategori/view' ||
                                        $p == 'pages/karyawan/view' ||
                                        $p == 'pages/karyawan/view_detail' ||
                                        $p == 'pages/karyawan/form' ||
                                        $p == 'pages/supplier/view' ||
                                        $p == 'pages/supplier/view_detail' ||
                                        $p == 'pages/supplier/form' ||
                                        $p == 'pages/supplier/view'
                                        ? 'active' : '';
                                ?>

                                    <li class="nav-item <?= $check_url ?> dropdown">
                                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Kelola Data Ex <i class="fa fa-angle-down"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li class="dropdown-submenu <?= $check_url_master ?>">
                                                <a href="#!" class="dropdown-toggle" data-toggle="dropdown">Data Master</a>
                                                <ul class="dropdown-menu">
                                                    <li class="<?= ($p == 'pages/kategori/view') ? 'active' : ''; ?>">
                                                        <a href="index.php?page=pages/kategori/view">Kategori</a>
                                                    </li>
                                                    <li class="<?= ($p == 'pages/karyawan/view' || $p == 'pages/karyawan/view_detail' || $p == 'pages/karyawan/form') ? 'active' : ''; ?>">
                                                        <a href="index.php?page=pages/karyawan/view">Karyawan</a>
                                                    </li>
                                                    <li class="<?= ($p == 'pages/supplier/view' || $p == 'pages/supplier/view_detail' || $p == 'pages/supplier/form') ? 'active' : ''; ?>">
                                                        <a href="index.php?page=pages/supplier/view">Supplier</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="<?= ($p == 'pages/barang/view' || $p == 'pages/barang/view_detail' || $p == 'pages/barang/form')  ? 'active' : ''; ?>">
                                                <a href="index.php?page=pages/barang/view">Barang</a>
                                            </li>
                                            <li class="<?= ($p == 'pages/peminjaman/view' || $p == 'pages/peminjaman/view_detail' || $p == 'pages/peminjaman/form') ? 'active' : ''; ?>">
                                                <a href="index.php?page=pages/peminjaman/view">Peminjaman</a>
                                            </li>
                                            <li class="<?= ($p == 'pages/pengadaan-unit/view' || $p == 'pages/pengadaan-unit/view_detail' || $p == 'pages/pengadaan-unit/form') ? 'active' : ''; ?>">
                                                <a href="index.php?page=pages/pengadaan-unit/view">Pengadaan-Unit</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <?php
                                    $pic_profile =  (empty($sesi['foto'])) ?
                                        "https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg?20200913095930" :
                                        'public/template/images/banner/' . $sesi['foto'];
                                    ?>

                                    <li class="nav-item <?= ($p == 'pages/petugas/view' || $p == 'pages/profile') ? 'active' : ''; ?> dropdown">
                                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                            <img src="<?= $pic_profile ?>" alt="" width='30px' height='30px' style='border-radius: 100%; border: 1px solid #DEE2E6'>
                                            &nbsp; <?= $sesi['username'] ?>
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li class="<?= ($p == 'pages/profile') ? 'active' : ''; ?>">
                                                <a href="index.php?page=pages/profile&id=<?= $sesi['id'] ?>">Profile</a>
                                            </li>
                                            <!-- Khusus admin -->
                                            <?php if ($sesi['role'] == 'admin') { ?>
                                                <li class="<?= ($p == 'pages/petugas/view') ? 'active' : ''; ?>">
                                                    <a href="index.php?page=pages/petugas/view">Kelola Petugas</a>
                                                </li>
                                            <?php } ?>
                                            <!-- |//////////| -->
                                            <li>
                                                <a href="session_out.php">Logout</a>
                                            </li>
                                        </ul>
                                    </li>

                                <?php } ?>


                            </ul>
                        </div>
                    </nav>
                </div>
                <!--/ Col end -->
            </div>
            <!--/ Row end -->
        </div>
        <!--/ Container end -->

    </div>
    <!--/ Navigation end -->
</header>
<!--/ Header end -->