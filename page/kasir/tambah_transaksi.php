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
                    <a class="nav-link" href="pelanggan.php">
                        <i class="mdi mdi-human-greeting menu-icon"></i>
                        <span class="menu-title">Pelanggan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="transaksi.php">
                        <i class="mdi mdi-chart-bar menu-icon"></i>
                        <span class="menu-title">Transaksi</span>
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
                                <h3 style="color: black;">Kasir Page</h3>
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
                                    <a type="button" class="btn btn-outline-primary btn-icon-text" href="transaksi_cari_pelanggan.php">
                                        <i class="mdi mdi-keyboard-backspace btn-icon-prepend"></i>
                                        Kembali
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Tambah Transaksi</h4>
                                    <p class="card-description">
                                        Silahkan menambahkan Transaksi
                                    </p>
                                    <?php
                                    include "../../connection/koneksi.php";
                                    $qry_get_member = mysqli_query($conn, "select * from tb_member where id = '" . $_GET['id'] . "'");
                                    $qry_get_outlet = mysqli_query($conn, "select * from tb_outlet where id = '" . $_SESSION['id_outlet'] . "'");
                                    $dt_outlet = mysqli_fetch_array($qry_get_outlet);
                                    $dt_member = mysqli_fetch_array($qry_get_member);
                                    // $invoice   = 'LNDRY'.Date('Ymdsi');
                                    ?>
                                    <form class="forms-sample" method="POST" action="proses_tambah_transaksi.php?id=<?= $_GET['id'] ?>">
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Nama Pelanggan</label>
                                            <input type="text" name="nama" class="form-control" id="exampleInputUsername1" disabled value="<?= $dt_member['nama'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Outlet</label>
                                            <input type="text" name="nama_outlet" class="form-control" id="exampleInputUsername1" disabled value="<?= $dt_outlet['nama'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Invoice</label>
                                            <input type="text" name="kode" class="form-control" id="exampleInputUsername1" disabled value="<?= 'LNDRY' . Date('Ymdsi'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect2">Paket</label>
                                            <select class="form-control" id="exampleFormControlSelect2" name="paket">
                                                <?php
                                                include "../../connection/koneksi.php";
                                                $qry_get_paket = mysqli_query($conn, "select * from tb_paket where tb_paket.id_outlet = '".$_SESSION['id_outlet']."'");
                                                while ($dt_paket = mysqli_fetch_array($qry_get_paket)) {
                                                ?>
                                                    <option value="<?= $dt_paket['id'] ?>"><?= $dt_paket['nama_paket'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Jumlah</label>
                                            <input type="number" class="form-control" name="jumlah" id="exampleInputUsername1" placeholder="Jumlah">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Diskon (%)</label>
                                            <input type="number" class="form-control" name="diskon" id="exampleInputUsername1" placeholder="Diskon" value="0">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Pajak (%)</label>
                                            <input type="number" class="form-control" name="pajak" id="exampleInputUsername1" placeholder="Pajak" value="0">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Biaya Tambahan</label>
                                            <input type="number" class="form-control" name="biaya_tambahan" id="exampleInputUsername1" placeholder="Biaya Tambahan" value="0">
                                        </div>
                                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                                        <button type="reset" class="btn btn-light">Reset</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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