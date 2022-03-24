<?php include "header.php"; ?>

<div class="container">
    <div class="page-header">
        <h3>Tambah Data Wali</h3>
    </div>

    <form action="" method="post">
        <table class="table">
            <tr>
                <td>Nama Guru</td>
                <td>
                    <select name="guru">
                        <option value="" selected>- Pilih Guru-</option>
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "pembayaran_spp");
                        $sqlGuru =  mysqli_query($con, "SELECT * FROM guru ORDER BY idguru ASC");
                        while ($g = mysqli_fetch_array($sqlGuru)) {
                            echo "<option value='$g[idguru]'>$g[namaguru]</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td><input type="text" name="kelas"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" class="btn btn-success" value="simpan"></td>
            </tr>
        </table>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $kelas = $_POST['kelas'];
        $guru  = $_POST['guru'];

        if ($kelas == '' || $guru == '') {
            echo "Form Belum Lengkap !";
        } else {
            //simpan data
            $simpan = mysqli_query($con, "INSERT INTO walikelas(kelas,idguru) VALUES ('$kelas','$guru') ");

            if (!$simpan) {
                echo "Proses penyimpanan data gagal !";
            } else {
                header('location:tampil_wali.php');
            }
        }
    }
    ?>
</div>
<?php include "footer.php"; ?>