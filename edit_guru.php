<?php include "header.php"; ?>

<?php
$con = mysqli_connect("localhost", "root", "", "pembayaran_spp");
$sqlEdit = mysqli_query($con, "SELECT * FROM guru WHERE idguru = '$_GET[id]'");
$e = mysqli_fetch_array($sqlEdit);
?>
<div class="container">
    <div class="page-header">
        <h1>Edit Data Guru</h1>
    </div>

    <form action="" method="post">
        <input type="hidden" name="idguru" value="<?= $e['idguru']; ?>">
        <table class="table">
            <tr>
                <td>Nama guru</td>
                <td><input type="text" class="form-control" name="namaguru" value="<?= $e['namaguru']; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input class="btn btn-success" type="submit" value="update"></td>
            </tr>
        </table>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //variabel untuk menampung inputan form
        $id   = $_POST['idguru'];
        $nama = $_POST['namaguru'];

        if ($nama == '') {
            echo "Form belum lengkap !";
        } else {
            //proses edit data
            $con = mysqli_connect("localhost", "root", "", "pembayaran_spp");
            $update = mysqli_query($con, "UPDATE guru SET namaguru='$nama' WHERE idguru='$id'");

            if (!$update) {
                echo " Proses Penyimpanan Data Gagal !";
            } else {
                header('location:tampil_guru.php');
            }
        }
    }

    ?>
</div>

<?php include "footer.php"; ?>