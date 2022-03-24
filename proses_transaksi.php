<?php
session_start();
if (isset($_SESSION['login'])) {
    $con = mysqli_connect("localhost", "root", "", "pembayaran_spp");
    if ($_GET['act'] == 'bayar') {

        $idspp = $_GET['id'];
        $nis   = $_GET['nis'];

        //membuat nomor pembayaran
        $today = date("ymd");
        $query = mysqli_query($con, "SELECT max(nobayar) AS last FROM spp WHERE nobayar LIKE '$today%' ");
        $data  = mysqli_fetch_array($query);
        $lastNoBayar = $data['last'];
        $lastNoUrut  = substr($lastNoBayar, 6, 4);
        $nextNoUrut  = $lastNoUrut + 1;
        $nextNoBayar = $today . sprintf('%04s', $nextNoUrut);

        //tanggal bayar
        $tglBayar = date('Y-m-d');

        //id admin
        $admin = $_SESSION['id'];

        mysqli_query($con, "UPDATE spp SET nobayar='$nextNoBayar',
                                        tglbayar='$tglBayar',
                                        ket='Lunas',
                                        idadmin='$admin'
                                    WHERE idspp='$idspp'");

        header("location:transaksi.php?nis=$nis&cari=Cari+Siswa");
    }
}
