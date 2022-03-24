<?php include "header.php"; ?>

<div class="container">
    <div class="page-header">
        <h3>Transaksi Pembayaran Spp</h3>
    </div>
    <form action="" method="get">
        NIS : <input type="text" name="nis">
        <input type="submit" class="btn btn-primary" name="cari" value="Cari Siswa">
    </form>
    <?php
    if (isset($_GET['nis']) && $_GET['nis'] != '') {
        $con = mysqli_connect("localhost", "root", "", "pembayaran_spp");
        $sqlSiswa = mysqli_query($con, "SELECT * FROM siswa WHERE nis='$_GET[nis]'");
        $ds = mysqli_fetch_array($sqlSiswa);
        $nis = $ds['nis'];
        ?>
        <div class="container">
            <div class="page-header">
                <h3>Biodata Siswa</h3>
            </div>

            <table class="table table-bordered table-striped">
                <tr>
                    <td>NIS</td>
                    <td width='40px'>:</td>
                    <td><?= $ds['nis']; ?></td>
                </tr>
                <tr>
                    <td>Nama Siswa</td>
                    <td>:</td>
                    <td><?= $ds['namasiswa']; ?></td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td>:</td>
                    <td><?= $ds['kelas']; ?></td>
                </tr>
                <tr>
                    <td>Tahun Ajaran</td>
                    <td>:</td>
                    <td><?= $ds['tahunajaran']; ?></td>
                </tr>
            </table>

            <div class="container">
                <div class="page-header">
                    <h3>Tagihan Spp</h3>
                </div>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>No</th>
                        <th>Bulan</th>
                        <th>Jatuh Tempo</th>
                        <th>No. Bayar</th>
                        <th>Tgl. Bayar</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                        <th>Bayar</th>
                    </tr>

                    <?php
                        $con = mysqli_connect("localhost", "root", "", "pembayaran_spp");
                        $sql = mysqli_query($con, "SELECT * FROM spp WHERE idsiswa='$ds[idsiswa]' ORDER BY jatuhtempo ASC");
                        $no = 1;
                        while ($d = mysqli_fetch_array($sql)) {
                            $idspp = $d['idspp'];
                            echo "<tr>
                <td>$no</td>
                <td>$d[bulan]</td>
                <td>$d[jatuhtempo]</td>
                <td>$d[nobayar]</td>
                <td>$d[tglbayar]</td>
                <td>$d[jumlah]</td>
                <td>$d[ket]</td>
                <td align='center'>";
                            if ($d['nobayar'] == '') {
                                echo "<a class='btn btn-success btn-sm' href ='proses_transaksi.php?nis=$nis&act=bayar&id=$idspp'>Bayar</a>";
                            } else {
                                echo "-";
                            }
                            echo "</td>
            </tr>";
                            $no++;
                        }
                        ?>
                </table>
            <?php
            }
            ?>
            </div>
            <?php include "footer.php"; ?>