<?php
if ($_GET['id']) {
    include "../../connection/koneksi.php";
    $qry_hapus = mysqli_query($conn, "delete from tb_paket where id='" . $_GET['id'] . "'");
    if ($qry_hapus) {
        echo "<script>alert('Sukses hapus Paket');location.href='paket.php';</script>";
    } else {
        echo "<script>alert('Gagal hapus Paket');location.href='paket.php';</script>";
    }
}
