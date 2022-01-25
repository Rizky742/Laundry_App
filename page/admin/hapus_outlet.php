<?php
if ($_GET['id']) {
    include "../../connection/koneksi.php";
    $qry_hapus = mysqli_query($conn, "delete from tb_outlet where id='" . $_GET['id'] . "'");
    if ($qry_hapus) {
        echo "<script>alert('Sukses hapus Outlet');location.href='outlet.php';</script>";
    } else {
        echo "<script>alert('Gagal hapus Outlet');location.href='outlet.php';</script>";
    }
}
