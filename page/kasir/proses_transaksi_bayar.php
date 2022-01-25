<?php
include "../../connection/koneksi.php";
$qry_transaksi = mysqli_query($conn, "select tb_member.nama as nama_member, tb_member.id, tb_transaksi.status, tb_transaksi.dibayar, tb_transaksi.kode_invoice, tb_transaksi.id, tb_detail_transaksi.total_harga, tb_detail_transaksi.id_transaksi from tb_member, tb_transaksi, tb_detail_transaksi where tb_member.id = tb_transaksi.id_member and tb_transaksi.id = tb_detail_transaksi.id_transaksi and tb_transaksi.id = '".$_GET['id']."'");
$dt_transaksi = mysqli_fetch_array($qry_transaksi);
if ($_POST) {
    session_start();
    $tgl_sekarang = Date('Y-m-d h:i:s');
    $jumlah_bayar = $_POST['jumlah_bayar'];
    $tagihan = $dt_transaksi['total_harga'];
    $dibayar = "dibayar";

    if (empty($jumlah_bayar)) {
        echo "<script>alert('Jumlah tidak boleh kosong');location.href='transaksi_bayar.php?id=".$_GET['id']."';</script>";
    }else if($jumlah_bayar<$tagihan){
        echo "<script>alert('Maaf uang anda kurang');location.href='transaksi_bayar.php?id=".$_GET['id']."';</script>";
    }
    else {
        include "../../connection/koneksi.php";
        $transaksi = mysqli_query($conn, "update tb_transaksi set tgl_bayar='".$tgl_sekarang."', dibayar='".$dibayar."' where id = '".$_GET['id']."'") or
        die(mysqli_error($conn));
        $detail_transaksi = mysqli_query($conn, "update tb_detail_transaksi set total_bayar='".$jumlah_bayar."' where id_transaksi = '".$_GET['id']."'") or
        die(mysqli_error($conn));
    }
    if ($transaksi) {
        echo "<script>alert('Pembayaran Sukses');location.href='transaksi.php';</script>";
    } else {
        echo "<script>alert('Pembayaran Gagal');location.href='transaksi_bayar.php?id=".$_GET['id']."';</script>";
    }
}
