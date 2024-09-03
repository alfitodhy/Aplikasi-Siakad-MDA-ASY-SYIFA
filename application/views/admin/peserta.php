<div class="container-fluid">
    <!-- Page Heading -->
    <?php $button = ($tahun) ? 'enabled' : 'disabled'; ?>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> <i class="fas fa-users"></i> Data Peserta Didik <?= $thn = ($tahun) ? $tahun['nama'] : '(Tidak Ada Tahun Ajaran Yang Aktif)';  ?></h1>
    </div>
    <?php if ($this->session->flashdata('message')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $this->session->flashdata('message'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <?php echo anchor('admin/pesertadidik/input', '<button class="btn btn-sm btn-primary mb-3 mr-2" ' . $button . '><i class="fas fa-plus fa-sm"></i> Tambah Data</button>') ?>
    <?php echo anchor('admin/pesertadidik/updatekelas', '<button class="btn btn-sm btn-primary mb-3 mr-2"><i class="fas fa-pen fa-sm"></i> Update Kelas</button>') ?>
    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label for="kelas">Kelas</label>
                <select class="form-control" id="kelas" name="kelas">
                    <option value="">--Pilih Kelas--</option>
                    <?php foreach ($kelas as $kl) : ?>
                        <option value="<?php echo $kl->id_kelas ?>"><?= $kl->kelas ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button onclick="lihatPeserta()" class="btn btn-primary" <?= $button ?>><i class="fas fa-search"></i> Lihat</button>
        </div>
    </div>

    <div id="data-peserta">
    </div>
</div>
</main>

<script>
    function lihatPeserta() {
        const idKelas = $('#kelas').val();
        const nameTahun = '<?= $tahun['nama'] ?>';

        $.ajax({
            type: 'POST',
            url: '<?= base_url('admin/pesertadidik/data_peserta') ?>',
            data: {
                id_kelas: idKelas,
                tahun: nameTahun
            },
            success: function(response) {
                $('#data-peserta').html(response);
            },
            error: function(response) {
                $('#data-peserta').html(response);
            }
        });
    }
    $(document).ready(function() {
        $(document).on('click', '#data-siswa', function() {
            const idsiswa = $(this).data('idsiswa');
            const href = '<?= site_url('admin/pesertadidik/delete/') ?>' + idsiswa;

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "data peserta akan dihapus",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus Data',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = href;
                }
            });
        });
    });
</script>