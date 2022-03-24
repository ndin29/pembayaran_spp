<?php
session_start();
if (isset($_SESSION['login'])) {
    $con = mysqli_connect("localhost", "root", "", "pembayaran_spp");
    $hapus = mysqli_query($con, "DELETE FROM siswa WHERE idsiswa='$_GET[id]'");

    if (!$hapus) {
        echo "Proses menghapus data Gagal!";
    } else {
        header('location:tampil_siswa.php');
    }
}
