<div class="container-fluid">
    <!-- Page Heading -->
    <?php $button = ($tahun) ? 'enabled' : 'disabled'; ?>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-sort-numeric-down"></i> Data Nilai <?= $thn = ($tahun) ? '(Tahun Ajaran ' . $tahun['nama'] . ')' : '(Tidak Ada Tahun Ajaran Yang Aktif)';  ?></h1>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="card">
                <div class="card-header bg-behance">
                    <h6 class="text-white">Masukkan Data Yang Diperlukan</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <select class="form-control" id="kelas" name="kelas">
                            <option value="">--Pilih Kelas--</option>
                            <?php foreach ($pengampu as $kl) : ?>
                                <option value="<?php echo $kl->id_kelas ?>"><?= $kl->kelas ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php echo form_error('kelas', '<div class="text-danger small ml-3">', '</div>') ?>
                    </div>
                    <div class="form-group">
                        <label for="mapel">Mata Pelajaran</label>
                        <select class="form-control" id="mapel" name="mapel">
                            <option value="">--Pilih Mata Pelajaran--</option>
                        </select>
                        <?php echo form_error('mapel', '<div class="text-danger small ml-3">', '</div>') ?>
                    </div>
                    <div class="form-group">
                        <label for="penilaian">Penilaian</label>
                        <select class="form-control" id="penilaian" name="penilaian">
                            <option value="">--Pilih Penilaian--</option>
                            <option value="UTS">UTS</option>
                            <option value="UAS">UAS</option>
                        </select>
                        <?php echo form_error('penilaian', '<div class="text-danger small ml-3">', '</div>') ?>
                    </div>
                    <button onclick="searchNilai()" class="btn btn-primary" <?= $button ?>><i class="fas fa-search"></i> Cari</button>
                </div>
            </div>
        </div>
        <div class="col-sm-9" id="table-result">

        </div>
    </div>
</div>
</main>

<script>
    $(document).ready(function() {
        $('#kelas').change(function() {
            const idkelas = $(this).val();
            const idGuru = '<?= $id_guru ?>';
            $.ajax({
                type: 'POST',
                url: '<?= base_url('guru/nilai/get_mapel') ?>',
                data: {
                    id_kelas: idkelas,
                    id_guru: idGuru
                },
                success: function(response) {
                    $('#mapel').html(response);
                }
            });
        })
    });

    function searchNilai() {
        const idKelas = $('#kelas').val()
        const idMapel = $('#mapel').val()
        const idGuru = '<?= $id_guru ?>';
        const penilaian = $('#penilaian').val()

        // if (idKelas !== '' && idMapel !== '') {
        $.ajax({
            type: 'POST',
            url: '<?= base_url('guru/nilai/data_nilai_permapel') ?>',
            data: {
                id_kelas: idKelas,
                id_mapel: idMapel,
                nilai: penilaian
            },
            success: function(response) {
                $('#table-result').html(response);
            },
            error: function(response) {
                $('#table-result').html(response);
            }
        });
        // }
    }
</script>