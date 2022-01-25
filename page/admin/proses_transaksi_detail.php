<?php
if ($_POST) {
    $status = $_POST['status'];
    include "../../connection/koneksi.php";
    $insert = mysqli_query($conn, "update tb_transaksi set status='".$status."' where id = '".$_GET['id']."'") or
        die(mysqli_error($conn));
    if ($insert) {
        echo "<script>alert('Sukses merubah status');location.href='transaksi.php';</script>";
    } else {
        echo "<script>alert('Gagal merubah status');location.href='transaksi_detail.php?id='".$_GET['id']."';</script>";
    }
}
