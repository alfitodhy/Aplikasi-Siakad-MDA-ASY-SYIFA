<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> <i class="fas fa-sticky-note"></i> Nilai</h1>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="form-inline">
                <select class="form-control mb-2 mr-2" id="thn_ajaran" name="thn_ajaran">
                    <?php foreach ($tahun as $th) : ?>
                        <?php foreach ($allkelas as $kl) : ?>
                            <?php if ($th->nama == $kl->tahun_ajaran) : ?>
                                <?php if ($th->nama == $kl->tahun_ajaran) : ?>
                                    <?php if ($th->id_tahun == $tahun_aktif['id_tahun']) : ?>
                                        <option value="<?php echo $th->id_tahun ?>" selected><?= $th->nama ?> - Semester <?= $th->semester ?></option>
                                    <?php else : ?>
                                        <option value="<?php echo $th->id_tahun ?>"><?= $th->nama ?> - Semester <?= $th->semester ?></option>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </select>
                <button onclick="lihatNilai()" class="btn btn-primary mb-2 mr-2"><i class="fas fa-search"></i> Lihat</button>
            </div>
            <div id="data-nilai">
                <h5 class="text-right">Kelas <?= $nama_kelas = ($kelas) ? $kelas['kelas'] : 'Belum Ditentukan'; ?></h5>
                <table class="table table-responsive-sm table-bordered table-striped table-sm w-100 d-block d-md-table" id="table-guru">
                    <thead>
                        <tr>
                            <th class="text-center" width="30px">No</th>
                            <th>Mata Pelajaran</th>
                            <th>UTS</th>
                            <th>UAS</th>
                            <th>Jumlah</th>
                            <th>Rata-rata</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($nilai as $key => $value) : ?>
                            <tr>
                                <td class="text-center"><?= ++$key ?></td>
                                <td><?= $value->nama_mapel ?></td>
                                <td><?= $value->uts ?></td>
                                <td><?= $value->uas ?></td>
                                <td><?= $value->jumlah ?></td>
                                <td><?= $value->rerata ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="5">Jumlah Seluruh Nilai</td>
                            <td><?= $total['jumlah'] ?></td>
                        </tr>
                        <tr>
                            <td colspan="5">Rata-rata Seluruh Nilai</td>
                            <td><?= $total['rerata'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</main>

<script>
    function lihatNilai() {
        const tahun = $('#thn_ajaran').val()

        $.ajax({
            type: 'POST',
            url: '<?= base_url('siswa/nilai/get_other_nilai') ?>',
            data: {
                id_tahun: tahun,
            },
            success: function(response) {
                $('#data-nilai').html(response);
            },
            error: function(response) {
                $('#data-nilai').html(response);
            }
        });
    }
</script>