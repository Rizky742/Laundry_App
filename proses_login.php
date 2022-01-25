<?php
if ($_POST) {
    include "connection/koneksi.php";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $username = mysqli_real_escape_string($conn, $username);
    $username = mysqli_real_escape_string($conn, $password);
    if (empty($username)) {
        echo "<script>alert('Username tidak boleh kosong');location.href='index.php';</script>";
    } elseif (empty($password)) {
        echo "<script>alert('Password tidak boleh kosong');location.href='index.php';</script>";
    } else {
        $qry_login = mysqli_query($conn, "select * from tb_user where username = '" . $username . "' and password = '" . md5($password) . "'");
        if (mysqli_num_rows($qry_login) > 0) {
            $dt_login = mysqli_fetch_array($qry_login);

            session_start();
            // $_SESSION['nama_petugas'] = $dt_login['nama_petugas'];

             
            $_SESSION['id_outlet']=$dt_login['id_outlet'];
            $_SESSION['user_id']=$dt_login['id'];
            $_SESSION['nama']=$dt_login['nama'];
            $_SESSION['status_login'] = true;
            $user = $dt_login['username'];
            $pass = $dt_login['password'];
            $level = $dt_login['role'];
            if($level=="admin"){
                header("location: page/admin/index.php");
            }elseif ($level=="kasir") {
                header("location: page/kasir/index.php");
            }
            else{
                header("location: page/owner/index.php");
            }
            
        } else {
            echo "<script>alert('Username dan Password tidak benar');location.href='index.php';</script>";
        }
    }
}
