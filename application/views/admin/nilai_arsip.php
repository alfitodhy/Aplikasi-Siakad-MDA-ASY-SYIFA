<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-archive"></i> Arsip Nilai <?= $thn = ($tahun) ? '(Tahun Ajaran ' . $tahun['nama'] . ' - Semester ' . $tahun['semester'] . ')' : '(Tidak Ada Tahun Ajaran Yang Aktif)';  ?> - <?= $jenis_nilai ?></h1>
    </div>
    <div class="card">
        <div class="card-body">
            <?php if (isset($data)) : ?>
                <div class="row form-group">
                    <label for="nama" class="col-sm-2 col-form-label">
                        <h6>Mata Pelajaran</h6>
                    </label>
                    <div class="col-sm-10">
                        <input type="text" name="nama" id="nama" value="<?= $mapel['nama_mapel'] ?>" class="form-control-plaintext" readonly="readonly">
                    </div>
                </div>
                <div class="row form-group">
                    <label for="nama" class="col-sm-2 col-form-label">
                        <h6>Kelas</h6>
                    </label>
                    <div class="col-sm-10">
                        <input type="text" name="nama" id="nama" value="<?= $kelas['kelas'] ?>" class="form-control-plaintext" readonly="readonly">
                    </div>
                </div>
                <div class="row form-group">
                    <label for="nama" class="col-sm-2 col-form-label">
                        <h6>KD</h6>
                    </label>
                    <div class="col-sm-10">
                        <input type="text" name="nama" id="nama" value="<?= $kd['nama_kd'] ?>" class="form-control-plaintext" readonly="readonly">
                    </div>
                </div>

                <table class="table table-responsive-sm table-bordered table-striped table-sm w-100 d-block d-md-table">
                    <thead>
                        <tr>
                            <th rowspan="2" style="vertical-align : middle;text-align:center;">No</th>
                            <th rowspan="2" style="vertical-align : middle;text-align:center;">Nama</th>
                            <?php foreach ($jenis as $jn => $value) : ?>
                                <th class="text-center">
                                    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#cancelarsip" id="set_cancelarsip" data-idkelas="<?= $kelas['id_kelas'] ?>" data-idmapel="<?= $mapel['id_mapel'] ?>" data-idkd="<?= $kd['id_kd'] ?>" data-nilai="<?= $jenis_nilai ?>" data-oldjenis="<?= $value->jenis ?>">
                                        <i class="fa fa-archive fa-sm"></i> Batal Arsip
                                    </button>
                                    <!-- <a href="" class="btn btn-sm btn-dark mr-1 ml-1 mb-1" onclick="return arsipNilai(event)"><i class="fa fa-archive fa-sm"></i> Batal Arsip</a>' . -->
                                </th>
                            <?php endforeach; ?>
                            <th rowspan="2" style="vertical-align : middle;text-align:center;">Jumlah</th>
                            <th rowspan="2" style="vertical-align : middle;text-align:center;">Rata-rata</th>
                        </tr>
                        <tr>
                            <?php foreach ($jenis as $jn => $value) : ?>
                                <th><?= $value->jenis ?></th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $dt => $value_dt) : ?>
                            <tr>
                                <td width="20px"><?= ++$dt ?></td>
                                <td><?= $value_dt['nama'] ?></td>
                                <?php foreach ($jenis as $jn => $value_jn) : ?>
                                    <td><?= $value_dt[$value_jn->jenis] ?> </td>
                                <?php endforeach; ?>
                                <td><?= $value_dt['jumlah'] ?></td>
                                <td><?= $value_dt['rerata'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <h6 class="text-center">Data Arsip Tidak Tersedia</h6>
            <?php endif; ?>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="cancelarsip" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-archive"></i> Pindahkan ke nilai utama</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="newjenis">pilih newjenis penilaian yang akan di masukan ke nilai utama?</label>
                        <select class="form-control" id="newjenis" name="newjenis">
                            <option value="">--Pilih Jenis Penilaian--</option>
                            <?php foreach ($jenis_penilai as $jn) : ?>
                                <option value="<?= $jn ?>"><?= $jn ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php echo form_error('newjenis', '<div class="text-danger small ml-3">', '</div>') ?>
                    </div>
                    <div id="btn-cancelarchive">
                        <button id="setcancelarchive" type="submit" class="btn btn-primary" disabled>Pindahkan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</main>

<script>
    $(document).ready(function() {
        $(document).on('click', '#set_cancelarsip', function() {
            const idKelas = $(this).data('idkelas');
            const idMapel = $(this).data('idmapel');
            const idKd = $(this).data('idkd');
            const jenisNilai = $(this).data('nilai');
            const oldJenisTugas = $(this).data('oldjenis');

            $(document).ready(function() {
                $('#newjenis').change(function() {
                    const newJenisTugas = $(this).val();
                    if (newJenisTugas !== null && newJenisTugas !== '') {
                        $('#btn-cancelarchive').html('<button id="setcancelarchive" type="submit" class="btn btn-primary" enabled>Pindahkan</button>');
                    } else {
                        $('#btn-cancelarchive').html('<button id="setcancelarchive" type="submit" class="btn btn-primary" disabled>Pindahkan</button>');
                    }

                    $(document).on('click', '#setcancelarchive', function() {
                        const href = '<?= base_url('admin/nilai/archive_cancel') ?>' + `?id_kelas=${idKelas}&id_mapel=${idMapel}&id_kd=${idKd}&nilai=${jenisNilai}&oldjenis=${oldJenisTugas}&newjenis=${newJenisTugas}`;
                        document.location.href = href;
                    });
                })
            });
        });
    });
</script>