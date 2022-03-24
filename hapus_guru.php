<?php
session_start();
if (isset($_SESSION['login'])) {
    $con = mysqli_connect("localhost", "root", "", "pembayaran_spp");
    $hapus = mysqli_query($con, "DELETE FROM guru WHERE idguru='$_GET[id]'");

    if (!$hapus) {
        echo "Proses menghapus data Gagal!";
    } else {
        header('location:tampil_guru.php');
    }
}
