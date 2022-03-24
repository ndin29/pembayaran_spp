<?php
session_start();
if (isset($_SESSION['login'])) {
    $con = mysqli_connect("localhost", "root", "", "pembayaran_spp");
    $hapus = mysqli_query($con, "DELETE FROM walikelas WHERE kelas='$_GET[kls]'");

    if (!$hapus) {
        echo "Proses Hapus Data Gagal !";
    } else {
        header('location:tampil_wali.php');
    }
}
