<?php include "header.php"; ?>

<?php
$con = mysqli_connect("localhost", "root", "", "pembayaran_spp");
$sqlEdit = mysqli_query($con, "SELECT * FROM walikelas WHERE kelas='$_GET[kls]'");
$e = mysqli_fetch_array($sqlEdit);
?>
<div class="container">
    <div class="page-header">
        <h3>Edit Data Kelas & Wali Kelas</h3>
    </div>

    <form method="post" action="">
    <input type="hidden" name="idwali" value="<?= $e['idguru']; ?>">
        <table class="table">
            <tr>
                <td>Pilih Guru / Wali kelas</td>
                <td>
                    <select name="guru">
                        <?php
                        $sqlGuru = mysqli_query($con, "SELECT * FROM guru ORDER BY idguru ASC");
                        while ($g = mysqli_fetch_array($sqlGuru)) {
                            if ($g['idguru'] == $e['idguru']) {
                                $selected = "selected";
                            } else {
                                $selected = "";
                            }

                            echo "<option value='$g[idguru]' $selected>$g[namaguru]</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td><input type="text" name="kelas" value="<?= $e['kelas']; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" class="btn btn-success" value="Update"></td>
            </tr>
        </table>
    </form>

    <!--Proses form-->
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $guru = $_POST['guru'];
        $kelas = $_POST['kelas'];

        if ($kelas == '' || $guru == '') {
            echo "Form belum lengkap!";
        } else {
            $update = mysqli_query($con, "UPDATE walikelas SET kelas='$kelas' WHERE  idguru='$guru'");
            if (!$update) {
                echo "Proses update data gagal !";
            } else {
                header('location:tampil_wali.php');
            }
        }
    }
    ?>
</div>

    <?php include "footer.php"; ?>