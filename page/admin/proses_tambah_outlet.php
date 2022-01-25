<?php
if ($_POST) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $noTelpon = $_POST['noTelpon'];
    if (empty($nama)) {
        echo "<script>alert('Nama tidak boleh kosong');location.href='tambah_outlet.php';</script>";
    } elseif (empty($alamat)) {
        echo "<script>alert('Alamat tidak boleh kosong');location.href='tambah_outlet.php';</script>";
    } elseif (empty($noTelpon)) {
        echo "<script>alert('No Telepon tidak boleh kosong');location.href='tambah_outlet.php';</script>";
    }else {
        include "../../connection/koneksi.php";
        $insert = mysqli_query($conn, "insert into tb_outlet(nama, alamat, tlp)
        value
('" . $nama . "','" . $alamat. "','" .$noTelpon."')") or
            die(mysqli_error($conn));
        if ($insert) {
            echo "<script>alert('Sukses menambahkan Outlet');location.href='outlet.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan Outlet');location.href='tambah_outlet.php';</script>";
        }
    }
}
