<?php
session_start();
include "../../connection/koneksi.php";
if ($_POST) {
    $qry_get_pass = mysqli_query($conn, "select * from tb_user where id = '".$_GET['id']."'");
    $dt_pass = mysqli_fetch_array($qry_get_pass);
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $newPassword = $_POST['newPassword'];
    $password = $_POST['password'];
    $outlet = $_POST['outlet'];
    $role = $_POST['role'];
    if (empty($nama)) {
        echo "<script>alert('Nama tidak boleh kosong');location.href='ubah_pengguna.php?id=".$_GET['id']."';</script>";
    } elseif (empty($username)) {
        echo "<script>alert('Username tidak boleh kosong');location.href='ubah_pengguna.php?id=".$_GET['id']."';</script>";
    } elseif (empty($password)) {
        echo "<script>alert('Password tidak boleh kosong');location.href='ubah_pengguna.php?id=".$_GET['id']."';</script>";
    } elseif (empty($outlet)) {
        echo "<script>alert('Outlet tidak boleh kosong');location.href='ubah_pengguna.php?id=".$_GET['id']."';</script>";
    }elseif(empty($newPassword)){
        echo "<script>alert('Password Baru tidak boleh kosong');location.href='ubah_pengguna.php?id=".$_GET['id']."';</script>";
    }elseif(md5($password)!=$dt_pass['password']){
        echo "<script>alert('Password tidak sesuai');location.href='ubah_pengguna.php?id=".$_GET['id']."';</script>";
    }else {
        include "../../connection/koneksi.php";
        // echo "tes";
        // UPDATE `tb_outlet` SET `nama`='".$nama."',`alamat`='[value-3]',`tlp`='[value-4]' WHERE 1
        $insert = mysqli_query($conn, "update tb_user set nama='".$nama."', username='".$username."', password='".md5($newPassword)."', id_outlet='".$outlet."', role='".$role."' where id = '".$_GET['id']."' ") or
            die(mysqli_error($conn));
        if ($insert) {
            echo "<script>alert('Sukses merubah Data Pengguna');location.href='pengguna.php';</script>";
        } else {
            echo "<script>alert('Gagal merubah Data Pengguna');location.href='ubah_pengguna.php?id_siswa=".$_GET['id']."';</script>";
        }
    }
}
