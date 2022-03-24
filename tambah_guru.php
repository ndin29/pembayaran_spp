<?php include "header.php"; ?>

<div class="container">
    <div class="page-header">
        <h1>Tambah Data Guru</h1>
    </div>
    <form action="" method="post">
        <table class="table">
            <tr>
                <td>Nama guru</td>
                <td><input type="text" name="namaguru"></td>
            </tr>
            <tr>
                <td></td>
                <td><input class="btn btn-success" type="submit" value="simpan"></td>
            </tr>
        </table>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //variabel untuk menampung inputan form
        $nama = $_POST['namaguru'];

        if ($nama == '') {
            echo "Form belum lengkap !";
        } else {
            //proses simpan data
            $con = mysqli_connect("localhost", "root", "", "pembayaran_spp");
            $simpan = mysqli_query($con, "INSERT INTO guru(namaguru) VALUES ('$nama')");

            if (!$simpan) {
                echo " Proses Penyimpanan Data Gagal !";
            } else {
                header('location:tampil_guru.php');
            }
        }
    }

    ?>
</div>
<?php include "footer.php"; ?>