<?php
session_start();
if ($_POST) {
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];
    $outlet = $_POST['outlet'];
    if (empty($nama)) {
        echo "<script>alert('Nama Paket tidak boleh kosong');location.href='ubah_paket.php';</script>";
    } elseif (empty($jenis)) {
        echo "<script>alert('Jenis tidak boleh kosong');location.href='ubah_paket.php';</script>";
    } elseif (empty($harga)) {
        echo "<script>alert('Harga tidak boleh kosong');location.href='ubah_paket.php';</script>";
    } elseif (empty($outlet)) {
        echo "<script>alert('Outlet tidak boleh kosong');location.href='ubah_paket.php';</script>";
    }else {
        include "../../connection/koneksi.php";
        // echo "tes";
        // UPDATE `tb_outlet` SET `nama`='".$nama."',`alamat`='[value-3]',`tlp`='[value-4]' WHERE 1
        $insert = mysqli_query($conn, "update tb_paket set id_outlet='".$outlet."', jenis='".$jenis."', nama_paket='".$nama."', harga='".$harga."' where id = '".$_GET['id']."' ") or
            die(mysqli_error($conn));
        if ($insert) {
            echo "<script>alert('Sukses merubah Data Paket');location.href='paket.php';</script>";
        } else {
            echo "<script>alert('Gagal merubah Data Paket');location.href='ubah_paket.php?id_siswa=".$_GET['id']."';</script>";
        }
    }
}
