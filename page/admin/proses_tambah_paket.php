<?php
if ($_POST) {
    $nama = $_POST['nama'];
    $outlet = $_POST['outlet'];
    $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];
    if (empty($nama)) {
        echo "<script>alert('Nama Paket tidak boleh kosong');location.href='tambah_paket.php';</script>";
    } elseif (empty($outlet)) {
        echo "<script>alert('Outlet tidak boleh kosong');location.href='tambah_paket.php';</script>";
    } elseif (empty($jenis)) {
        echo "<script>alert('Jenis tidak boleh kosong');location.href='tambah_paket.php';</script>";
    } elseif(empty($harga)) {
        echo "<script>alert('Harga tidak boleh kosong');location.href='tambah_paket.php';</script>";
    }
    else {
        include "../../connection/koneksi.php";
        $insert = mysqli_query($conn, "insert into tb_paket(id_outlet, jenis, nama_paket, harga)
        value
('" . $outlet . "','" . $jenis. "','" .$nama."','".$harga."')") or
            die(mysqli_error($conn));
        if ($insert) {
            echo "<script>alert('Sukses menambahkan Paket');location.href='paket.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan Paket');location.href='tambah_paket.php';</script>";
        }
    }
}
