<!DOCTYPE html>
<html lang="en" class="notranslate" translate="no">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="google" content="notranslate">

    <!-- Main styles for this application-->
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>assets/vendors/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>assets/vendors/jquery/jquery.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>assets/vendors/jquery-easing/jquery.easing.min.js"></script>

    <title>Laporan Daftar Guru</title>

    <style>
        td {
            white-space: nowrap;
        }

        th {
            white-space: nowrap;
        }

        div {
            display: inline-block;
        }
    </style>
</head>

<body style="background-color: white; color: black;">
    <img src="<?= base_url('assets/img/logo.jpg') ?>" style="position: absolute; width: 110px; height: auto;">
    <table style="width: 100%;">
        <tr>
            <td align="center">
                <span style="line-height: 1.6; font-weight: bold; font-size: 28px; color: black;">MADRASAH DINIYAH AWALIYAH (MDA) ASY - SYIFA</span>
                <br>TRINI 005/016, TRIHANGGO, GAMPING, SLEMAN
                <br>Telepon : (0736) 20569
                <br>E-mail : asysyifa266@yahoo.com
            </td>
        </tr>
    </table>

    <hr class="line-title">
    <p align="center">
        <span style="font-size: 20px">LAPORAN DATA NILAI SISWA</span>
        <br>
        <b>TAHUN AJARAN <?= $tahun['nama'] ?></b>
        <br>
        <?= 'KELAS ' . $kelas['kelas'] ?>
    </p>
    <table class="table table-bordered" id="table-laporansiswa" style="width: 100%;">
        <thead>
            <tr class="text-center">
                <th width="10px" style="vertical-align : middle;text-align:center;">No</th>
                <th width="10px" style="vertical-align : middle;text-align:center;">NIS</th>
                <th style="vertical-align : middle;text-align:center;">NISN</th>
                <th style="vertical-align : middle;text-align:center;">Nama</th>
                <?php
                //heading mapel
                foreach ($mapel as $key => $value) {
                    echo "<th>$value->nama_mapel</th>";
                }
                ?>
                <th>Jumlah</th>
                <th>Rata-rata</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $key => $value) : ?>
                <tr>
                    <td class="text-center"><?= ++$key ?></td>
                    <td><?= $value['nis'] ?></td>
                    <td><?= $value['nisn'] ?></td>
                    <td><?= $value['nama'] ?></td>
                    <?php foreach ($mapel as $kd => $value_mp) : ?>
                        <td><?= $value[$value_mp->nama_mapel] ?></td>
                    <?php endforeach; ?>
                    <td><?= $value['jumlah'] ?></td>
                    <td><?= $value['rerata'] ?></td>
                </tr>
            <?php endforeach; ?>

            <?php foreach ($min as $key => $value) : ?>
                <tr>
                    <td colspan="4">MIN</td>
                    <?php foreach ($mapel as $kd => $value_mp) : ?>
                        <td><?= $value[$value_mp->nama_mapel] ?></td>
                    <?php endforeach; ?>
                    <td><?= $value['jumlah'] ?></td>
                    <td><?= $value['rerata'] ?></td>
                </tr>
            <?php endforeach; ?>

            <?php foreach ($max as $key => $value) : ?>
                <tr>
                    <td colspan="4">MAX</td>
                    <?php foreach ($mapel as $kd => $value_mp) : ?>
                        <td><?= $value[$value_mp->nama_mapel] ?></td>
                    <?php endforeach; ?>
                    <td><?= $value['jumlah'] ?></td>
                    <td><?= $value['rerata'] ?></td>
                </tr>
            <?php endforeach; ?>

            <?php foreach ($jumlah as $key => $value) : ?>
                <tr>
                    <td colspan="4">JUMLAH</td>
                    <?php foreach ($mapel as $kd => $value_mp) : ?>
                        <td><?= $value[$value_mp->nama_mapel] ?></td>
                    <?php endforeach; ?>
                    <td><?= $value['jumlah'] ?></td>
                    <td><?= $value['rerata'] ?></td>
                </tr>
            <?php endforeach; ?>

            <?php foreach ($rerata as $key => $value) : ?>
                <tr>
                    <td colspan="4">RATA-RATA</td>
                    <?php foreach ($mapel as $kd => $value_mp) : ?>
                        <td><?= $value[$value_mp->nama_mapel] ?></td>
                    <?php endforeach; ?>
                    <td><?= $value['jumlah'] ?></td>
                    <td><?= $value['rerata'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>