<div class="container-fluid">
    <!-- Page Heading -->
    <?php $button = ($tahun) ? 'enabled' : 'disabled'; ?>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-sort-numeric-down"></i> Data Nilai <?= $thn = ($tahun) ? '(Tahun Ajaran ' . $tahun['nama'] . ' - Semester ' . $tahun['semester'] . ' )' : '(Tidak Ada Tahun Ajaran Yang Aktif)'; ?> - Kelas <?= $kelas['kelas'] ?></h1>
    </div>

    <div class="row">

        <div class="col-sm-3">
            <div class="card">
                <div class="card-header bg-behance">
                    <h6 class="text-white">Masukkan Data Yang Diperlukan</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="mapel">Mata Pelajaran</label>
                        <select class="form-control" id="mapel" name="mapel">
                            <?php if ($mapel->num_rows() > 0) {
                                echo '<option value="">--Pilih Mata Pelajaran--</option>';
                                foreach ($mapel->result() as $mp) {
                                    echo "<option value=$mp->id_mapel>$mp->nama_mapel</option>";
                                }
                            } else {
                                echo '<option value="">--Tidak Tersedia--</option>';
                            } ?>
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
    function searchNilai() {
        const idKelas = <?= $kelas['id_kelas'] ?>;
        const idMapel = $('#mapel').val();
        const jenisNilai = $('#penilaian').val();

        // if (idKelas !== '' && idMapel !== '') {
        $.ajax({
            type: 'POST',
            url: '<?= base_url('walikelas/nilai/data_nilai_permapel') ?>',
            data: {
                id_kelas: idKelas,
                id_mapel: idMapel,
                nilai: jenisNilai
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