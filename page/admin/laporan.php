<?php
session_start();
if ($_SESSION['status_login'] != true) {
    header('location: ../../index.php');
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LaundryApp</title>
    <!-- base:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../assets/css2/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />

</head>

<body>
    <div class="container-scroller d-flex">
        <div class="row p-0 m-0 proBanner d-none" id="proBanner">
            <div class="col-md-12 p-0 m-0">
                <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
                    <div class="ps-lg-1">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                            <a href="https://www.bootstrapdash.com/product/spica-admin/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="https://www.bootstrapdash.com/product/spica-admin/"><i class="mdi mdi-home me-3 text-white"></i></a>
                        <button id="bannerClose" class="btn border-0 p-0">
                            <i class="mdi mdi-close text-white mr-0"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- partial:./partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item sidebar-category">
                    <p>Navigation</p>
                    <span></span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">
                        <i class="mdi mdi-view-quilt menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="outlet.php">
                        <i class="mdi mdi-home menu-icon"></i>
                        <span class="menu-title">Outlet</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pelanggan.php">
                        <i class="mdi mdi-human-greeting menu-icon"></i>
                        <span class="menu-title">Pelanggan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="paket.php">
                        <i class="mdi mdi-package-up menu-icon"></i>
                        <span class="menu-title">Paket</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pengguna.php">
                        <i class="mdi mdi-account menu-icon"></i>
                        <span class="menu-title">Pengguna</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="transaksi.php">
                        <i class="mdi mdi-chart-bar menu-icon"></i>
                        <span class="menu-title">Transaksi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="laporan.php">
                        <i class="mdi mdi-library-books menu-icon"></i>
                        <span class="menu-title">Laporan</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:./partials/_navbar.html -->
            <nav class="navbar col-lg-12 col-12 px-0 py-0 py-lg-4 d-flex flex-row">
                <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                        <span class="mdi mdi-menu"></span>
                    </button>
                    <div class="navbar-brand-wrapper">
                        <!-- <a class="navbar-brand brand-logo" href="index.html"><img src="../../assets/images/logo.svg" alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../../assets/images/logo-mini.svg" alt="logo"/></a> -->
                        <h1 class="navbar-brand mb-0 h1" style="color: white;">Laundry</h1>
                    </div>
                    <h4 class="font-weight-bold mb-0 d-none d-md-block mt-1">Welcome back, <?= $_SESSION['nama'] ?></h4>
                    <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item">
                            <?php
                            include "../../connection/koneksi.php";
                            $qry_get_outletNama = mysqli_query($conn, "select tb_outlet.nama as nama, tb_outlet.id from tb_outlet where tb_outlet.id = '" . $_SESSION['id_outlet'] . "'");
                            $data_nama = mysqli_fetch_array($qry_get_outletNama);
                            ?>
                            <h4 class="mb-0 font-weight-bold d-none d-xl-block">Outlet: <?= $data_nama['nama'] ?></h4>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                        <span class="mdi mdi-menu"></span>
                    </button>
                </div>
                <div class="navbar-menu-wrapper navbar-search-wrapper d-none d-lg-flex align-items-center">
                    <ul class="navbar-nav mr-lg-2">
                        <li class="nav-item nav-search d-none d-lg-block">
                            <div class="input-group">
                                <h3 style="color: black;">Admin Page</h3>
                            </div>
                        </li>
                    </ul>
                    <!-- <ul class="navbar-nav mr-lg-2">
            <li class="nav-item nav-search d-none d-lg-block">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search Here..." aria-label="search" aria-describedby="search">
              </div>
            </li>
          </ul> -->
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item nav-profile dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                                <img src="../../assets/images/faces/face5.jpg" alt="profile" />
                                <span class="nav-profile-name"><?= $_SESSION['nama'] ?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                                <a href="logout.php" class="dropdown-item">
                                    <i class="mdi mdi-logout text-primary"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <a type="button" class="btn btn-outline-primary btn-icon-text" href="cetak.php" style="margin-right: 15px;">
                                        <i class="mdi mdi-printer btn-icon-prepend"></i>
                                        Cetak
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between flex-wrap">
                                        <p class="card-title">Pendapatan bulan ini</p>
                                    </div>
                                    <div class="d-flex align-items-center flex-wrap mb-3">
                                        <?php

                                        include "../../connection/koneksi.php";
                                        // $qry_get_pendapatan_bulan = mysqli_query($conn, "select sum(tb_detail_transaksi.total_harga) as total_harga, tb_transaksi.dibayar, tb_transaksi.id, tb_transaksi.tgl_bayar,tb_detail_transaksi.id_transaksi from tb_detail_transaksi,tb_transaksi where tb_detail_transaksi.id_transaksi = tb_transaksi.id and tb_transaksi.dibayar = 'dibayar' and month(tb_transaksi.tgl_bayar) = month(now())");
                                        $qry_get_pendapatan_bulan = mysqli_query($conn, "select sum(tb_detail_transaksi.total_harga) as total_harga, tb_transaksi.dibayar, tb_transaksi.id, tb_transaksi.tgl_bayar,tb_detail_transaksi.id_transaksi, tb_detail_transaksi.id_paket, tb_paket.id, tb_paket.id_outlet from tb_detail_transaksi,tb_transaksi, tb_paket where tb_detail_transaksi.id_transaksi = tb_transaksi.id and tb_detail_transaksi.id_paket = tb_paket.id and tb_paket.id_outlet = '".$_SESSION['id_outlet']."' and tb_transaksi.dibayar = 'dibayar' and month(tb_transaksi.tgl_bayar) = month(now())");
                                        $dt_pendapatan_bulan = mysqli_fetch_array($qry_get_pendapatan_bulan);
                                        // $qry_get_pendapatan_minggu = mysqli_query($conn, "select sum(tb_detail_transaksi.total_harga) as total_harga, tb_transaksi.dibayar, tb_transaksi.id, tb_transaksi.tgl_bayar,tb_detail_transaksi.id_transaksi from tb_detail_transaksi,tb_transaksi where tb_detail_transaksi.id_transaksi = tb_transaksi.id and tb_transaksi.dibayar = 'dibayar' and week(tb_transaksi.tgl_bayar) = week(now())");
                                        $qry_get_pendapatan_minggu = mysqli_query($conn, "select sum(tb_detail_transaksi.total_harga) as total_harga, tb_transaksi.dibayar, tb_transaksi.id, tb_transaksi.tgl_bayar,tb_detail_transaksi.id_transaksi, tb_detail_transaksi.id_paket, tb_paket.id, tb_paket.id_outlet from tb_detail_transaksi,tb_transaksi, tb_paket where tb_detail_transaksi.id_transaksi = tb_transaksi.id and tb_detail_transaksi.id_paket = tb_paket.id and tb_paket.id_outlet = '".$_SESSION['id_outlet']."' and tb_transaksi.dibayar = 'dibayar' and week(tb_transaksi.tgl_bayar) = week(now())");
                                        $dt_pendapatan_minggu = mysqli_fetch_array($qry_get_pendapatan_minggu);
                                        //$qry_get_pendapatan_tahun = mysqli_query($conn, "select sum(tb_detail_transaksi.total_harga) as total_harga, tb_transaksi.dibayar, tb_transaksi.id, tb_transaksi.tgl_bayar,tb_detail_transaksi.id_transaksi from tb_detail_transaksi,tb_transaksi where tb_detail_transaksi.id_transaksi = tb_transaksi.id and tb_transaksi.dibayar = 'dibayar' and year(tb_transaksi.tgl_bayar) = year(now())");
                                        $qry_get_pendapatan_tahun = mysqli_query($conn, "select sum(tb_detail_transaksi.total_harga) as total_harga, tb_transaksi.dibayar, tb_transaksi.id, tb_transaksi.tgl_bayar,tb_detail_transaksi.id_transaksi, tb_detail_transaksi.id_paket, tb_paket.id, tb_paket.id_outlet from tb_detail_transaksi,tb_transaksi, tb_paket where tb_detail_transaksi.id_transaksi = tb_transaksi.id and tb_detail_transaksi.id_paket = tb_paket.id and tb_paket.id_outlet = '".$_SESSION['id_outlet']."' and tb_transaksi.dibayar = 'dibayar' and year(tb_transaksi.tgl_bayar) = year(now())");
                                        $dt_pendapatan_tahun = mysqli_fetch_array($qry_get_pendapatan_tahun);

                                        ?>
                                        <h5 class="font-weight-normal mb-0 mb-md-1 mb-lg-0 me-3">Rp. <?= $dt_pendapatan_bulan['total_harga'] ?></h5>
                                    </div>
                                    <canvas id="balance-chart" height="130"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between flex-wrap">
                                        <p class="card-title">Pendapat Minggu ini</p>
                                    </div>
                                    <div class="d-flex align-items-center flex-wrap mb-3">
                                        <h5 class="font-weight-normal mb-0 mb-md-1 mb-lg-0 me-3">Rp. <?= $dt_pendapatan_minggu['total_harga'] ?></h5>
                                    </div>
                                    <canvas id="balance-chart2" height="130"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between flex-wrap">
                                        <p class="card-title">Pendapat Tahun ini</p>
                                    </div>
                                    <div class="d-flex align-items-center flex-wrap mb-3">
                                        <h5 class="font-weight-normal mb-0 mb-md-1 mb-lg-0 me-3">Rp. <?= $dt_pendapatan_tahun['total_harga'] ?></h5>
                                    </div>
                                    <canvas id="balance-chart3" height="130"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Transaksi Terbaru</h4>
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            No
                                                        </th>
                                                        <th>
                                                            Nama Paket
                                                        </th>
                                                        <th>
                                                            Jumlah Transaksi
                                                        </th>
                                                        <th>
                                                            Jumlah Transaksi (Lunas)
                                                        </th>
                                                        <th>
                                                            Jumlah Transaksi (Belum Lunas)
                                                        </th>
                                                        <th>
                                                            Total Hasil (lunas)
                                                        </th>
                                                        <th>
                                                            Total Hasil (belum lunas)
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                include "../../connection/koneksi.php";
                                                // $qry_paket = mysqli_query($conn, "select tb_paket.nama_paket, count(tb_detail_transaksi.id_paket) as total_transaksi, sum(if(tb_transaksi.dibayar='dibayar',tb_detail_transaksi.total_harga,0)) as total_harga_lunas, sum(if(tb_transaksi.dibayar='belum_dibayar',tb_detail_transaksi.total_harga,0)) as total_harga_belum_lunas, sum(if(tb_transaksi.dibayar='dibayar',1,0)) as jmllunas, sum(if(tb_transaksi.dibayar='belum_dibayar',1,0)) as jmlblmlunas, tb_transaksi.dibayar, tb_detail_transaksi.id_transaksi, tb_transaksi.id, tb_paket.id from tb_detail_transaksi, tb_transaksi, tb_paket where tb_transaksi.id = tb_detail_transaksi.id_transaksi and tb_transaksi.id and tb_paket.id = tb_detail_transaksi.id_paket group by tb_paket.id");
                                                $qry_paket = mysqli_query($conn, "select tb_paket.nama_paket, count(tb_detail_transaksi.id_paket) as total_transaksi, sum(if(tb_transaksi.dibayar='dibayar',tb_detail_transaksi.total_harga,0)) as total_harga_lunas, sum(if(tb_transaksi.dibayar='belum_dibayar',tb_detail_transaksi.total_harga,0)) as total_harga_belum_lunas, sum(if(tb_transaksi.dibayar='dibayar',1,0)) as jmllunas, sum(if(tb_transaksi.dibayar='belum_dibayar',1,0)) as jmlblmlunas, tb_transaksi.dibayar, tb_detail_transaksi.id_transaksi, tb_transaksi.id, tb_paket.id, tb_paket.id_outlet from tb_detail_transaksi, tb_transaksi, tb_paket where tb_transaksi.id = tb_detail_transaksi.id_transaksi and tb_transaksi.id and tb_paket.id = tb_detail_transaksi.id_paket and tb_paket.id_outlet = '".$_SESSION['id_outlet']."' group by tb_paket.id");
                                                $no = 0;
                                                while ($data_paket = mysqli_fetch_array($qry_paket)) {
                                                    $no++; ?>
                                                    <tr>
                                                        <td><?= $no ?></td>
                                                        <td><?= $data_paket['nama_paket'] ?></td>
                                                        <td><?= $data_paket['total_transaksi'] ?></td>
                                                        <td><?= $data_paket['jmllunas'] ?></td>
                                                        <td><?= $data_paket['jmlblmlunas'] ?></td>
                                                        <td><?= $data_paket['total_harga_lunas'] ?></td>
                                                        <td><?= $data_paket['total_harga_belum_lunas'] ?></td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- row end -->

                        <!-- row end -->
                    </div>
                    <!-- content-wrapper ends -->
                    <!-- partial:./partials/_footer.html -->
                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->

        <!-- base:js -->
        <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page-->
        <script src="../../assets/vendors/chart.js/Chart.min.js"></script>
        <script src="../../assets/js/jquery.cookie.js" type="text/javascript"></script>
        <!-- End plugin js for this page-->
        <!-- inject:js -->
        <script src="../../assets/js/off-canvas.js"></script>
        <script src="../../assets/js/hoverable-collapse.js"></script>
        <script src="../../assets/js/template.js"></script>
        <!-- endinject -->
        <!-- plugin js for this page -->
        <script src="../../assets/js/jquery.cookie.js" type="text/javascript"></script>
        <!-- End plugin js for this page -->
        <!-- Custom js for this page-->
        <script src="../../assets/js/dashboard.js"></script>
        <!-- End custom js for this page-->
</body>

</html>