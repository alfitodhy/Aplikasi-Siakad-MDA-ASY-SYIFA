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
        <span style="font-size: 20px">LAPORAN DATA GURU</span>
    </p>
    <center>
        <table class="mt-3">
            <tr>
                <td>NIK</td>
                <td> : <?= $guru['nip'] ?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td> : <?= $guru['nama'] ?></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td> : <?= $guru['jenis_kelamin'] ?></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td> : <?= $guru['tanggal_lahir'] ?></td>
            </tr>
            <tr>
                <td>No. Handphone</td>
                <td> : <?= $guru['no_hp'] ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td> : <?= $guru['email'] ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td> : <?= $guru['alamat'] ?></td>
            </tr>
        </table>
        <legend class="mt-3">
            <h5>Mata Pelajaran Yang Diampu</h5>
        </legend>
    </center>
    <table class="table table-bordered">
        <thead>
            <tr class="text-center">
                <th width=50px>No</th>
                <th>Mata Pelajaran</th>
                <th>Kelas</th>
                <th>Jumlah KD</th>
                <th>Tahun Ajaran</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $key => $value) : ?>
                <tr>
                    <td class="text-center"><?= ++$key ?></td>
                    <td><?= $value->nama_mapel ?></td>
                    <td><?= $value->kelas ?></td>
                    <td><?= $value->kd ?></td>
                    <td><?= $value->tahun ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>