<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-sort-numeric-down"></i> Detail Nilai <?= $mapel['nama_mapel'] . ' / Kelas ' . $kelas['kelas'] ?> <?= $thn = ($tahun) ? '(Tahun Ajaran ' . $tahun['nama'] . ' - Semester ' . $tahun['semester'] . ')' : '(Tidak Ada Tahun Ajaran Yang Aktif)';  ?> - <?= $jenis_nilai ?></h1>
    </div>
    <?php if ($this->session->flashdata('message')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $this->session->flashdata('message'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label for="komp_dasar">Kompetensi Dasar</label>
                <select class="form-control" id="komp_dasar" name="komp_dasar">
                    <option value="">--Pilih Kompetensi Dasar--</option>
                    <?php foreach ($komp_dasar as $kd) : ?>
                        <option value="<?php echo $kd->id_kd ?>"><?= $kd->nama_kd ?></option>
                    <?php endforeach; ?>
                </select>
                <?php echo form_error('komp_dasar', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>
            <button onclick="lihatNilai()" class="btn btn-primary"><i class="fas fa-search"></i> Lihat</button>
        </div>
    </div>
    <div id="nilai-detail">
    </div>
</div>

</main>

<script>
    // $(document).ready(function() {
    //     $('#komp_dasar').change(function() {
    //         const idKd = $(this).val();
    //         const idMapel = '<?= $id_mapel ?>';
    //         const idKelas = '<?= $id_kelas ?>';
    //         $.ajax({
    //             type: 'POST',
    //             url: '<?= base_url('guru/nilai/data_nilai_perkd') ?>',
    //             data: {
    //                 id_kelas: idKelas,
    //                 id_mapel: idMapel,
    //                 id_kd: idKd
    //             },
    //             success: function(response) {
    //                 $('#nilai-detail').html(response);
    //             },
    //             error: function(response) {
    //                 $('#nilai-detail').html(response);
    //             }
    //         });
    //     })
    // });

    function lihatNilai() {
        const idKd = $('#komp_dasar').val();
        const idMapel = '<?= $id_mapel ?>';
        const idKelas = '<?= $id_kelas ?>';
        const nameTahun = '<?= $tahun['nama'] ?>';
        const jenisNilai = '<?= $jenis_nilai ?>';

        $.ajax({
            type: 'POST',
            url: '<?= base_url('guru/nilai/data_nilai_perkd') ?>',
            data: {
                id_kelas: idKelas,
                id_mapel: idMapel,
                id_kd: idKd,
                tahun: nameTahun,
                nilai: jenisNilai
            },
            success: function(response) {
                $('#nilai-detail').html(response);
            },
            error: function(response) {
                $('#nilai-detail').html(response);
            }
        });
    }

    function deleteNilai(e) {
        const href = e.target.href;
        e.preventDefault();
        if (href !== undefined) {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "data nilai akan diarsipkan",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Arsip Data',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = href;
                }
            });
        }

    }
</script>