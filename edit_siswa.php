<?php include "header.php"; ?>

<?php
$con = mysqli_connect("localhost", "root", "", "pembayaran_spp");
$sqlEdit = mysqli_query($con, "SELECT * FROM siswa WHERE idsiswa='$_GET[id]'");
$e = mysqli_fetch_array($sqlEdit);
?>
<div class="container">
    <div class="page-header">
        <h3>Tambah Data Siswa</h3>
    </div>
    <form action="" method="post">
        <input type="hidden" name="idsiswa" value="<?= $e['idsiswa']; ?>">
        <table class="table">
            <tr>
                <td>NIS</td>
                <td><input type="text" name="nis" class="form-control" maxlength="10" value="<?= $e['nis']; ?>"></td>
            </tr>
            <tr>
                <td>Nama Siswa</td>
                <td><input type="text" name="namasiswa" class="form-control" maxlength="40" value="<?= $e['namasiswa']; ?>"></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>
                    <select name="kelas">
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "pembayaran_spp");
                        $sqlKelas = mysqli_query($con, "SELECT * FROM walikelas ORDER BY kelas ASC");
                        while ($k = mysqli_fetch_array($sqlKelas)) {
                            // if ($k = mysqli_fetch_array($sqlKelas)) {
                            //     $selected = "selected";
                            // } else {
                            //     $selected = "";
                            // }
                            // ?>
                            <option value="<?= $k['kelas']; ?>"><?= $k['kelas']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tahun Ajaran</td>
                <td><input type="text" name="tahunajaran" class="form-control" value="<?= $e['tahunajaran']; ?>"></td>
            </tr>
            <tr>
                <td>Biaya SPP</td>
                <td><input type="text" name="biaya" class="form-control" value="<?= $e['biaya']; ?>"></td>
            </tr>
            <tr>
                <td>Jatuh Tempo</td>
                <td><input type="text" name="jatuhtempo" class="form-control" value="2019-10-10" readonly></td>
            </tr>
            <tr>
                <td></td>
                <td><input class="btn btn-success" type="submit" value="Update"></td>
            </tr>
        </table>
    </form>


    <!-- Proses Edit Data -->
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //variabel untuk menampung data
        $idsiswa   = $_POST['idsiswa'];
        $nis       = $_POST['nis'];
        $nama      = $_POST['namasiswa'];
        $kelas     = $_POST['kelas'];
        $tahun     = $_POST['tahunajaran'];
        $biaya     = $_POST['biaya'];
        $awaltempo = $_POST['jatuhtempo'];

        if ($nis != '' && $nama != '' && $kelas != '' && $tahun == '' && $biaya == '') {
            echo "Form belum lengkap !";
        } else {
            $update = mysqli_query($con, "UPDATE siswa SET nis='$nis',
                                        namasiswa='$nama',
                                        kelas='$kelas',
                                        tahunajaran='$tahun',
                                        biaya='$biaya'
                                    WHERE idsiswa='$idsiswa'");
            if (!$update) {
                echo "Proses edit Data Gagal !";
            } else {
                header('location:tampil_siswa.php');
            }
        }
    }
    ?>
</div>
    <?php include "footer.php"; ?>