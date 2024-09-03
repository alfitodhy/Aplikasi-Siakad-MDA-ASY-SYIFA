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

    <title>Laporan Daftar Siswa</title>
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
        <span style="font-size: 20px">LAPORAN DATA SISWA</span>
    </p>
    <table>
        <tr>
            <td rowspan="20" width="220px" class="align-text-top text-center">
                <img src="<?= base_url('assets/photos/user-placeholder.jpg') ?>" class="mt-4" style="width: 150px; height: 250px;">
            </td>
            <td colspan="2" class="mb-2"><b>DATA DIRI</b></td>
        </tr>
        <tr>
            <td width="200px">NIS</td>
            <td>: <?= $siswa['nis'] ?></td>
        </tr>
        <tr>
            <td width="200px">NISN</td>
            <td>: <?= $siswa['nisn'] ?></td>
        </tr>
        <tr>
            <td width="200px">NAMA</td>
            <td>: <?= $siswa['nama'] ?></td>
        </tr>
        <tr>
            <td width="200px">JENIS KELAMIN</td>
            <td>: <?= $siswa['jenis_kelamin'] ?></td>
        </tr>
        <tr>
            <td width="200px">TANGGAL LAHIR</td>
            <td>: <?= $siswa['tanggal_lahir'] ?></td>
        </tr>
        <tr>
            <td width="200px">AGAMA</td>
            <td>: <?= $siswa['agama'] ?></td>
        </tr>
        <tr>
            <td colspan="2" class="mb-2 mt-2"><b>DATA ORANG TUA</b></td>
        </tr>
        <tr>
            <td width="200px">NAMA AYAH</td>
            <td>: <?= $siswa['nama_ayah'] ?></td>
        </tr>
        <tr>
            <td width="200px">PENDIDIKAN AYAH</td>
            <td>: <?= $siswa['pendidikan_ayah'] ?></td>
        </tr>
        <tr>
            <td width="200px">PEKERJAAN AYAH</td>
            <td>: <?= $siswa['pekerjaan_ayah'] ?></td>
        </tr>
        <tr>
            <td width="200px">NAMA IBU</td>
            <td>: <?= $siswa['nama_ibu'] ?></td>
        </tr>
        <tr>
            <td width="200px">PENDIDIKAN IBU</td>
            <td>: <?= $siswa['pendidikan_ibu'] ?></td>
        </tr>
        <tr>
            <td width="200px">PEKERJAAN IBU</td>
            <td>: <?= $siswa['pekerjaan_ibu'] ?></td>
        </tr>
        <tr>
            <td width="200px">NO. HANDPHONE</td>
            <td>: <?= $siswa['no_hp'] ?></td>
        </tr>
        <tr>
            <td colspan="2" class="mb-2 mt-2"><b>ALAMAT</b></td>
        </tr>
        <tr>
            <td width="200px">DUSUN</td>
            <td>: <?= $siswa['dusun'] ?></td>
        </tr>
        <tr>
            <td width="200px">DESA</td>
            <td>: <?= $siswa['desa'] ?></td>
        </tr>
        <tr>
            <td width="200px">KECAMATAN</td>
            <td>: <?= $siswa['kecamatan'] ?></td>
        </tr>
        <tr>
            <td width="200px">KABUPATEN</td>
            <td>: <?= $siswa['kabupaten'] ?></td>
        </tr>
    </table>
    <!-- <?php if ($siswa['photo'] != null) : ?>
        <img src="<?= base_url('assets/photos/' . $siswa['photo']) ?>" style="width: 200px; height: 300px; border-radius: 15px;">
    <?php endif ?> -->

</body>

</html>