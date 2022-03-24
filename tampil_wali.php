<?php include "header.php"; ?>

<div class="container">
    <div class="page-header">
        <h3>Data Wali</h3>
    </div>
    <a class="btn btn-success" style="margin-bottom:10px" href="tambah_wali.php">Tambah Wali Kelas</a>
    <table class="table table-bordered table-striped">
        <tr>
            <th>No</th>
            <th>Nama Wali</th>
            <th>Kelas</th>
            <th>Opsi</th>
        </tr>
        <?php
        $con = mysqli_connect("localhost", "root", "", "pembayaran_spp");
        $sql = mysqli_query($con, "SELECT walikelas.kelas, walikelas.idguru, guru.namaguru
                                FROM walikelas
                            INNER JOIN guru ON walikelas.idguru = guru.idguru
                                ORDER BY walikelas.kelas ASC");
        $no = 1;
        while ($d = mysqli_fetch_array($sql)) {
            echo "<tr>
            <td width='40px'>$no</td>
            <td>$d[namaguru]</td>
            <td>$d[kelas]</td>
            <td align='center' width='160px'>
                <a class='btn btn-warning btn-sm' href='edit_wali.php?kls=$d[kelas]'>Edit</a>
                <a class='btn btn-danger btn-sm' href='hapus_wali.php?kls=$d[kelas]'>Hapus</a>
            </td>
        </tr>";
            $no++;
        }

        ?>
    </table>
    <?php include "footer.php"; ?>