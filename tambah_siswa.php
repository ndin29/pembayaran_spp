<?php include "header.php"; ?>

<div class="container">
    <div class="page-header">
        <h3>Tambah Data Siswa</h3>
    </div>
    <form action="" method="post">
        <table class="table">
            <tr>
                <td>NIS</td>
                <td><input type="text" name="nis" maxlength="10"></td>
            </tr>
            <tr>
                <td>Nama Siswa</td>
                <td><input type="text" name="namasiswa" maxlength="40"></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>
                    <select name="kelas">
                        <option value="" selected>- Pilih Kelas</option>
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "pembayaran_spp");
                        $sqlKelas = mysqli_query($con, "SELECT * FROM walikelas ORDER BY kelas ASC");
                        while ($k = mysqli_fetch_array($sqlKelas)) {
                            ?>
                            <option value="<?= $k['kelas']; ?>"><?= $k['kelas']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tahun Ajaran</td>
                <td><input type="text" name="tahunajaran" value="2019/2020"></td>
            </tr>
            <tr>
                <td>Biaya SPP</td>
                <td><input type="text" name="biaya" value="490000"></td>
            </tr>
            <tr>
                <td>Jatuh Tempo</td>
                <td><input type="text" name="jatuhtempo" value="2019-10-10" readonly></td>
            </tr>
            <tr>
                <td></td>
                <td><input class="btn btn-success" type="submit" value="simpan"></td>
            </tr>
        </table>
    </form>

    <!-- Simpan Data -->
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //variabel untuk menampung data
        $nis       = $_POST['nis'];
        $nama      = $_POST['namasiswa'];
        $kelas     = $_POST['kelas'];
        $tahun     = $_POST['tahunajaran'];
        $biaya     = $_POST['biaya'];
        $awaltempo = $_POST['jatuhtempo'];

        //membuat array untuk menampung bulan bahasa indonesia
        $bulanIndo = array(
            '01' => 'Januari',
            '02' => 'februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        );

        //proses simpan
        if ($nis != '' && $nama != '' && $kelas != '' && $tahun == '' && $biaya == '') {
            echo "Form belum lengkap !";
        } else {
            $simpan = mysqli_query($con, "INSERT INTO siswa(nis,namasiswa,kelas,tahunajaran,biaya)
                                    VALUES('$nis','$nama','$kelas','$tahun','$biaya')");
            if (!$simpan) {
                echo "Proses Penyimpanan Data Gagal !";
            } else {
                //ambil data siswa terakhir
                $ds = mysqli_fetch_array(mysqli_query($con, "SELECT idsiswa FROM siswa ORDER BY idsiswa DESC LIMIT 1"));
                $idsiswa = $ds['idsiswa'];

                //membuat tagihan 12 bulan dimuali dari oktober 2019 dan menyimpan tagihan di tabel spp 
                for ($i = 0; $i < 12; $i++) {
                    //membuat tanggal jatuh tempo setiap tanggal 10
                    $jatuhtempo =  date("Y-m-d", strtotime("+$i month ", strtotime($awaltempo)));

                    $bulan = $bulanIndo[date('m', strtotime($jatuhtempo))] . " " . date('Y', strtotime($jatuhtempo));

                    mysqli_query($con, "INSERT INTO spp(idsiswa,jatuhtempo,bulan,jumlah) VALUES('$idsiswa','$jatuhtempo',
                                '$bulan','$biaya')");
                }

                header('location:tampil_siswa.php');
            }
        }
    }
    ?>
</div>
<?php include "footer.php"; ?>