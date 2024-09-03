<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> <i class="fas fa-sticky-note"></i> Laporan Detail Guru</h1>
    </div>

    <div class="card">
        <div class="card-body">
            <a href="<?= base_url('admin/laporanguru/pdf_laporan?q=detaildata&id=' . $id_guru) ?> " class="btn btn-info mb-2"><i class="fas fa-print"></i> Print</a>
            <legend class="mt-3 text-center">
                <h2>Laporan Data Guru</h2>
            </legend>

            <table class="mt-3 w-100">
                <tr>
                    <td>NIK</td>
                    <td> : <?= $guru['nip'] ?></td>
                    <td rowspan="7" class="text-right">
                        <?php if ($guru['photo'] != null) : ?>
                            <div class="mb-3">
                                <img src="<?= base_url('assets/photos/' . $guru['photo']) ?>" alt="photo <?= $guru['nama'] ?>" style="max-width:120px; max-height:170px; object-fit: scale-down; object-position: center;">
                            </div>
                        <?php else : ?>
                            <div class="mb-3">
                                <img src="<?= base_url('assets/photos/user-placeholder.jpg') ?>" alt="photo <?= $guru['nama'] ?>" style="max-width:120px; max-height:170px; object-fit: scale-down; object-position: center;">
                            </div>
                        <?php endif ?>
                    </td>
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
                    <td width="140px">No. Handphone</td>
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
            <legend class="mt-3 text-center">
                <h5>Mata Pelajaran Yang Diampu</h5>
            </legend>
            <table class="table table-responsive-sm table-bordered table-striped table-sm w-100 d-block d-md-table mt-3" id="table-laporanguru">
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
                            <td class="text-center">
                                <?= ++$key ?>
                            </td>
                            <td>
                                <?= $value->nama_mapel ?>
                            </td>
                            <td>
                                <?= $value->kelas ?>
                            </td>
                            <td>
                                <?= $value->kd ?>
                            </td>
                            <td>
                                <?= $value->tahun ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</main>