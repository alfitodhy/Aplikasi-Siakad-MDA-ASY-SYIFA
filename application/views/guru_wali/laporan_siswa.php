<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> <i class="fas fa-sticky-note"></i> Laporan Daftar Siswa Kelas <?= $kelas['kelas'] ?></h1>
    </div>
    <div class="card">
        <div class="card-header bg-behance">
            <h6 class="text-white">Masukkan Data Yang Diperlukan</h6>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="thn_ajaran">Tahun Ajaran</label>
                <select class="form-control" id="thn_ajaran" name="thn_ajaran">
                    <option value="">--Pilih Tahun Ajaran--</option>
                    <?php foreach ($tahun as $th) : ?>
                        <option value="<?= $th->nama ?>"><?= $th->nama ?></option>
                    <?php endforeach; ?>
                </select>
                <?php echo form_error('thn_ajaran', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>
            <button onclick="lihatSiswa()" class="btn btn-primary"><i class="fas fa-search"></i> Lihat</button>
        </div>
    </div>
    <div id="data-all-siswa"></div>
</div>
</main>

<script>
    function lihatSiswa() {
        const thnAjaran = $('#thn_ajaran').val();
        const kelas = '<?= $kelas['id_kelas'] ?>';

        $.ajax({
            type: 'POST',
            url: '<?= base_url('walikelas/laporansiswa/data_all_siswa') ?>',
            data: {
                tahun: thnAjaran,
                id_kelas: kelas
            },
            success: function(response) {
                $('#data-all-siswa').html(response);
            },
            error: function(response) {
                $('#data-all-siswa').html(response);
            }
        });
    }
</script>