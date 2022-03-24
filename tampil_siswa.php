<?php include "header.php"; ?>

<div class="container">
    <div class="page-header">
        <h3>Data Siswa</h3>
    </div>
    <a class="btn btn-primary" style="margin-bottom:10px" href="tambah_siswa.php">Tambah Siswa</a>
    <table class="table table-bordered table-striped">
        <tr>
            <th>No.</th>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>Kelas</th>
            <th>Tahun Ajaran</th>
            <th>Biaya</th>
            <th>Opsi</th>
        </tr>
        <?php
        $con = mysqli_connect("localhost", "root", "", "pembayaran_spp");
        $sql = mysqli_query($con, "SELECT * FROM siswa ORDER BY kelas ASC");
        $no = 1;
        while ($d = mysqli_fetch_array($sql)) {
            echo "<tr>
        <td width='40px' align='center'>$no</td>
        <td>$d[nis]</td>
        <td>$d[namasiswa]</td>
        <td>$d[kelas]</td>
        <td>$d[tahunajaran]</td>
        <td>$d[biaya]</td>
        <td align='center'>
            <a class='btn btn-warning btn-sm' href='edit_siswa.php?id=$d[idsiswa]'>Edit</a>
            <a class='btn btn-danger btn-sm' href='hapus_siswa.php?id=$d[idsiswa]'>Hapus</a>
        </td>
    </tr>";
            $no++;
        }
        ?>
        </center>
    </table>
    <?php include "footer.php"; ?>