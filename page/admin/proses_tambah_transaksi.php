<?php
if ($_POST) {
    session_start();
    $outlet = $_SESSION['id_outlet'];
    $paket = $_POST['paket'];
    $id_user = $_SESSION['user_id'];
    $invoice = 'LNDRY'.Date('Ymdsi');
    $id_member = $_GET['id'];
    $tgl_sekarang = Date('Y-m-d h:i:s');
    $tujuh_hari   = mktime(0,0,0,date("n"),date("j")+7,date("Y")); // Query batas waktu
    $batas_waktu = Date('Y-m-d h:i:s', $tujuh_hari); // Batas Waktu
    $biaya_tambahan = $_POST['biaya_tambahan'];
    $diskon = $_POST['diskon'];
    $pajak = $_POST['pajak'];
    $status = "baru";
    $jumlah = $_POST['jumlah'];
    $dibayar = "belum_dibayar";

    if (empty($jumlah)) {
        echo "<script>alert('Jumlah tidak boleh kosong');location.href='tambah_transaksi.php?id=".$_GET['id']."';</script>";
    }
    else {
        include "../../connection/koneksi.php";
        $transaksi = mysqli_query($conn, "insert into tb_transaksi(id_outlet, kode_invoice,id_member,tgl, batas_waktu, biaya_tambahan, diskon, pajak, status, dibayar, id_user) value ('" . $outlet . "','" . $invoice. "','" . $id_member. "','" .$tgl_sekarang."','".$batas_waktu."','".$biaya_tambahan."','".$diskon."','".$pajak."','".$status."','".$dibayar."','".$id_user."')") or
        die(mysqli_error($conn));
        if ($transaksi) {
            include "../../connection/koneksi.php";
            $qry_get_outlet = mysqli_query($conn, "select * from tb_outlet where id = '".$outlet."'");
            $qry_get_harga = mysqli_query($conn, "select * from tb_paket where id = '".$paket."'");
            $qry_get_transaksi = mysqli_query($conn, "select * from tb_transaksi where kode_invoice = '".$invoice."'");
            $dt_transaksi = mysqli_fetch_array($qry_get_transaksi);
            $dt_paket = mysqli_fetch_array($qry_get_harga);
            $dt_outlet = mysqli_fetch_array($qry_get_outlet);
            $harga = $dt_paket['harga'];
            // $diskon = ($harga*$jumlah)-($diskon/100*$harga*$jumlah);
            // $total_harga = ($diskon + ($pajak/100*$diskon) + $biaya_tambahan);
            // $total_harga = ($harga*$jumlah);
            $total = ($jumlah*$harga)-($diskon/100*$harga*$jumlah)+$biaya_tambahan;
            $total_harga = $total+($pajak/100*$total);
            // if($biaya_tambahan !=0){
            //     $total_harga = $harga*$jumlah+$biaya_tambahan;
            // }elseif($diskon !=0) {
            //     $total = $harga*$jumlah;
            //     $diskon = ($diskon/100)*$total;
            //     $total_harga = $total - $diskon;
            // }elseif($pajak !=0){
            //     $total = $harga*$jumlah;
            //     $pajak = ($pajak/100)*$total;
            //     $total_harga = $total - $pajak;
            // }elseif($biaya_tambahan !=0 && $diskon !=0){
            //     $total = $harga*$jumlah;
            //     $diskon = ($diskon/100)*$total;
            //     $total_harga = ($total - $diskon) + $biaya_tambahan;
            // }elseif($diskon !=0 && $pajak !=0){
            //     $total = $harga*$jumlah;
            //     $diskon = ($diskon/100)*$total;
            //     $pajak = ($pajak/100)*$total;
            //     $total_harga = ($total - $diskon) + $pajak;
            // }elseif($diskon !=0 && $pajak !=0 && $biaya_tambahan != 0){
            //     $total = $harga*$jumlah;
            //     $diskon = ($diskon/100)*$total;
            //     $pajak = ($pajak/100)*$total;
            //     $total_harga = ($total - $diskon) + $pajak + $biaya_tambahan;
            // }else{
            //     $total_harga = $harga*$jumlah;
            // }
            $id_transaksi = $dt_transaksi['id'];
            $detail_transaksi = mysqli_query($conn, "insert into tb_detail_transaksi(id_transaksi, id_paket, qty, total_harga) value ('" . $id_transaksi . "','" . $paket. "','" .$jumlah."','".$total_harga."')") or
            die(mysqli_error($conn));
            
            echo "<script>alert('Transaksi Sukses');location.href='transaksi.php';</script>";

        } else {
            echo "<script>alert('Transaksi Gagal');location.href='tambah_transaksi.php?id=".$_GET['id']."';</script>";
        }
    }
}
