<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-sort-numeric-down"></i> Input Nilai <?= $mapel['nama_mapel'] . ' / Kelas ' . $kelas['kelas'] ?> <?= $thn = ($tahun) ? '(Tahun Ajaran ' . $tahun['nama'] . ' - Semester ' . $tahun['semester'] . ')' : '(Tidak Ada Tahun Ajaran Yang Aktif)';  ?> - <?= $jenis_penilaian ?></h1>
    </div>

    <div class="card">
        <dic class="card-body">
            <form action="" method="post">
                <div class="mb-3 row form-group">
                    <label for="nama" class="col-sm-2 col-form-label">
                        <h6>Guru Pengajar</h6>
                    </label>
                    <div class="col-sm-10">
                        <input type="text" name="nama" id="nama" value="<?= $pengajar['nama'] ?>" class="form-control-plaintext" readonly="readonly">
                    </div>
                </div>
                <div class="mb-3 row form-group">
                    <label for="nama" class="col-sm-2 col-form-label">
                        <h6>Komptensi Dasar</h6>
                    </label>
                    <div class="col-sm-10">
                        <input type="text" name="nama" id="nama" value="<?= $komp_dasar['nama_kd'] ?>" class="form-control-plaintext" readonly="readonly">
                    </div>
                </div>
                <div class="mb-3 row form-group">
                    <label for="inputPassword" class="col-sm-2 col-form-label">
                        <h6>Jenis Penilaian</h6>
                    </label>
                    <div class="col-sm-10">
                        <select class="form-control" id="jenis" name="jenis">
                            <option value="">--Pilih jenis Nilai--</option>
                            <?php foreach ($jenis_nilai as $jn) : ?>
                                <option value="<?= $jn ?>"><?= $jn ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php echo form_error('jenis', '<div class="text-danger small ml-3">', '</div>') ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-responsive-sm table-bordered table-striped table-sm w-100 d-block d-md-table">
                            <thead>
                                <tr>
                                    <th width="60px">NIS</th>
                                    <th>Nama</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($siswa as $key => $value) : ?>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" name="nis<?= $key ?>" id="nis<?= $key ?>" value="<?= $value->nis ?>" class="form-control-plaintext" readonly="readonly">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" name="nama<?= $key ?>" id="nama<?= $key ?>" value="<?= $value->nama ?>" class="form-control-plaintext" readonly="readonly">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="number" name="nilai<?= $key ?>" id="nilai<?= $key ?>" placeholder="Masukan Nilai (1 - 100)" class="form-control">
                                                <?php echo form_error('nilai' . $key, '<div class="text-danger small ml-3">', '</div>') ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-secondary ml-1">Reset</button>
            </form>
        </dic>
    </div>
</div>

</main>