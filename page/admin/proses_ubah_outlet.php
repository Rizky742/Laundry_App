<?php
session_start();
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
        // echo "tes";
        // UPDATE `tb_outlet` SET `nama`='".$nama."',`alamat`='[value-3]',`tlp`='[value-4]' WHERE 1
        $insert = mysqli_query($conn, "update tb_outlet set nama='".$nama."', alamat='".$alamat."', tlp='".$noTelpon."' where id = '".$_GET['id']."' ") or
            die(mysqli_error($conn));
        if ($insert) {
            echo "<script>alert('Sukses merubah Outlet');location.href='outlet.php';</script>";
        } else {
            echo "<script>alert('Gagal merubah Outlet');location.href='ubah_outlet.php?id_siswa=".$_GET['id']."';</script>";
        }
    }
}
