<?php
if ($_POST) {
    $nama = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $outlet = $_POST['outlet'];
    $role = $_POST['role'];
    if (empty($nama)) {
        echo "<script>alert('Nama tidak boleh kosong');location.href='signup.php';</script>";
    } elseif (empty($username)) {
        echo "<script>alert('Username tidak boleh kosong');location.href='signup.php';</script>";
    } elseif (empty($password)) {
        echo "<script>alert('Password tidak boleh kosong');location.href='signup.php';</script>";
    } elseif (empty($outlet)) {
        echo "<script>alert('Outlet tidak boleh kosong');location.href='signup.php';</script>";
    } elseif (empty($role)) {
        echo "<script>alert('Role tidak boleh kosong');location.href='signup.php';</script>";
    } else {
        include "../connection/koneksi.php";
        $insert = mysqli_query($conn, "insert into tb_user(nama, username, password, id_outlet, role)
        value
('" . $nama . "','" . $username . "','" . md5($password) . "','" . $outlet . "','" .$role."')") or
            die(mysqli_error($conn));
        if ($insert) {
            echo "<script>alert('Sukses menambahkan user');location.href='login.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan siswa');location.href='signup.php';</script>";
        }
    }
}
