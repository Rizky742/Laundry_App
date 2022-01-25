<?php
if ($_POST) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $noTelpon = $_POST['noTelpon'];
    $gender = $_POST['gender'];
    if (empty($nama)) {
        echo "<script>alert('Nama tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
    } elseif (empty($alamat)) {
        echo "<script>alert('Alamat tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
    } elseif (empty($noTelpon)) {
        echo "<script>alert('No Telepon tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
    } elseif(empty($gender)) {
        echo "<script>alert('Jenis Kelamin tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
    }
    else {
        include "../../connection/koneksi.php";
        $insert = mysqli_query($conn, "insert into tb_member(nama, alamat, tlp, jenis_kelamin)
        value
('" . $nama . "','" . $alamat. "','" .$noTelpon."','".$gender."')") or
            die(mysqli_error($conn));
        if ($insert) {
            echo "<script>alert('Sukses menambahkan Pelanggan');location.href='pelanggan.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan Pelanggan');location.href='tambah_pelanggan.php';</script>";
        }
    }
}
