<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> <i class="fas fa-sticky-note"></i> Laporan Detail Siswa</h1>
    </div>

    <div class="card">
        <div class="card-body">
            <a href="<?= base_url('admin/laporansiswa/pdf_laporan?q=detaildata&id=' . $id_siswa) ?> " class="btn btn-info mb-2"><i class="fas fa-print"></i> Print</a>
            <legend class="mt-3 text-center">
                <h2>Laporan Data Siswa</h2>
            </legend>

            <div class="row mr-5">
                <div class="col-sm-3" class="text-center">
                    <div id="photo" class="mb-3 mt-3 text-center">
                        <?php if ($siswa['photo']) : ?>
                            <img src="<?= base_url('assets/photos/' . $siswa['photo']) ?>" alt="photo <?= $siswa['nama'] ?>" style="width: 200px; height: 300px; border-radius: 15px;">
                        <?php else : ?>
                            <img src="<?= base_url('assets/photos/user-placeholder.jpg') ?>" alt="photo <?= $siswa['nama'] ?>" style="width: 200px; height: 300px; border-radius: 15px;">
                        <?php endif ?>
                    </div>
                </div>
                <div class="col-sm-9">
                    <table class="table table-borderless no-margin table-striped">
                        <thead>
                            <tr>
                                <th colspan="2">DATA DIRI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td width="300px">NIS</td>
                                <td><?= $siswa['nis'] ?></td>
                            </tr>
                            <tr>
                                <td width="300px">NISN</td>
                                <td><?= $siswa['nisn'] ?></td>
                            </tr>
                            <tr>
                                <td width="300px">NAMA</td>
                                <td><?= $siswa['nama'] ?></td>
                            </tr>
                            <tr>
                                <td width="300px">JENIS KELAMIN</td>
                                <td><?= $siswa['jenis_kelamin'] ?></td>
                            </tr>
                            <tr>
                                <td width="300px">TANGGAL LAHIR</td>
                                <td><?= $siswa['tanggal_lahir'] ?></td>
                            </tr>
                            <tr>
                                <td width="300px">AGAMA</td>
                                <td><?= $siswa['agama'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-borderless no-margin table-striped">
                        <thead>
                            <tr>
                                <th colspan="2">DATA ORANG TUA</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td width="300px">NAMA AYAH</td>
                                <td><?= $siswa['nama_ayah'] ?></td>
                            </tr>
                            <tr>
                                <td width="300px">PENDIDIKAN AYAH</td>
                                <td><?= $siswa['pendidikan_ayah'] ?></td>
                            </tr>
                            <tr>
                                <td width="300px">PEKERJAAN AYAH</td>
                                <td><?= $siswa['pekerjaan_ayah'] ?></td>
                            </tr>
                            <tr>
                                <td width="300px">NAMA IBU</td>
                                <td><?= $siswa['nama_ibu'] ?></td>
                            </tr>
                            <tr>
                                <td width="300px">PENDIDIKAN IBU</td>
                                <td><?= $siswa['pendidikan_ibu'] ?></td>
                            </tr>
                            <tr>
                                <td width="300px">PEKERJAAN IBU</td>
                                <td><?= $siswa['pekerjaan_ibu'] ?></td>
                            </tr>
                            <tr>
                                <td width="300px">NO. HANDPHONE</td>
                                <td><?= $siswa['no_hp'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-borderless no-margin table-striped">
                        <thead>
                            <tr>
                                <th colspan="2">ALAMAT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td width="300px">DUSUN</td>
                                <td><?= $siswa['dusun'] ?></td>
                            </tr>
                            <tr>
                                <td width="300px">DESA</td>
                                <td><?= $siswa['desa'] ?></td>
                            </tr>
                            <tr>
                                <td width="300px">KECAMATAN</td>
                                <td><?= $siswa['kecamatan'] ?></td>
                            </tr>
                            <tr>
                                <td width="300px">KABUPATEN</td>
                                <td><?= $siswa['kabupaten'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</main>