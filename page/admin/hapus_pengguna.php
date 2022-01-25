<?php
if ($_GET['id']) {
    include "../../connection/koneksi.php";
    $qry_hapus = mysqli_query($conn, "delete from tb_user where id='" . $_GET['id'] . "'");
    if ($qry_hapus) {
        echo "<script>alert('Sukses hapus pengguna');location.href='pengguna.php';</script>";
    } else {
        echo "<script>alert('Gagal hapus pengguna');location.href='pengguna.php';</script>";
    }
}
