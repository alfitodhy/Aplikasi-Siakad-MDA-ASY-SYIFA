<div class="container-fluid">
    <?php if ($this->session->flashdata('message')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $this->session->flashdata('message'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <div class="card">
        <div class="card-header">
            <i class="fas fa-users mr-3"></i>Form Update Kelas Peserta Didik
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="row">
                    <div class="form-group col-sm-3">
                        <label for="oldtahun">Tahun Ajaran Lama</label>
                        <select class="form-control" id="oldtahun" name="oldtahun">
                            <option value="">--Pilih Tahun Ajaran Lama--</option>
                            <?php foreach ($nama_tahun as $th) : ?>
                                <option value="<?= $th->nama ?>"><?= $th->nama ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php echo form_error('oldtahun', '<div class="text-danger small ml-3">', '</div>') ?>
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="oldkelas">Kelas</label>
                        <div class="input-group control-group after-add-kelas">
                            <select class="form-control" id="oldkelas" name="oldkelas">
                                <option value="">--Pilih Kelas--</option>
                                <?php foreach ($kelas as $kl) : ?>
                                    <option value="<?php echo $kl->id_kelas ?>"><?= $kl->kelas ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="input-group-btn">
                                <button class="btn btn-primary add-kelas ml-1" onclick="previewOldPeserta()" type="button"><i class="fas fa-search"></i> Preview</i></button>
                            </div>
                        </div>
                        <?php echo form_error('oldkelas', '<div class="text-danger small ml-3">', '</div>') ?>
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="newtahun">Tahun Ajaran Baru</label>
                        <select class="form-control" id="newtahun" name="newtahun">
                            <option value="">--Pilih Tahun Ajaran Baru--</option>
                            <?php foreach ($nama_tahun as $th) : ?>
                                <option value="<?= $th->nama ?>"><?= $th->nama ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php echo form_error('newtahun', '<div class="text-danger small ml-3">', '</div>') ?>
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="newkelas">Kelas</label>
                        <div class="input-group control-group after-add-kelas">
                            <select class="form-control" id="newkelas" name="newkelas">
                                <option value="">--Pilih Kelas--</option>
                                <?php foreach ($kelas as $kl) : ?>
                                    <option value="<?php echo $kl->id_kelas ?>"><?= $kl->kelas ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="input-group-btn">
                                <button class="btn btn-primary add-kelas ml-1" onclick="previewNewPeserta()" type="button"><i class="fas fa-search"></i> Preview</i></button>
                            </div>
                        </div>
                        <?php echo form_error('newkelas', '<div class="text-danger small ml-3">', '</div>') ?>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6" id="data-old">
                    </div>
                    <div class="form-group col-sm-6" id="data-new">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="reset" class="btn btn-secondary ml-1">Reset</button>
            </form>
        </div>
    </div>
</div>
</main>

<script>
    function previewOldPeserta() {
        const nameTahun = $('#oldtahun').val();
        const idKelas = $('#oldkelas').val();

        console.log(nameTahun + '=' + idKelas);

        if (nameTahun != "" && idKelas != "") {
            $.ajax({
                type: 'POST',
                url: '<?= base_url('admin/pesertadidik/previewold') ?>',
                data: {
                    id_kelas: idKelas,
                    tahun: nameTahun
                },
                success: function(response) {
                    $('#data-old').html(response);
                },
                error: function(response) {
                    $('#data-old').html(response);
                }
            });
        }
    }

    function previewNewPeserta() {
        const nameTahun = $('#newtahun').val();
        const idKelas = $('#newkelas').val();

        console.log(nameTahun + '=' + idKelas);

        if (nameTahun != "" && idKelas != "") {
            $.ajax({
                type: 'POST',
                url: '<?= base_url('admin/pesertadidik/previewnew') ?>',
                data: {
                    id_kelas: idKelas,
                    tahun: nameTahun
                },
                success: function(response) {
                    $('#data-new').html(response);
                },
                error: function(response) {
                    $('#data-new').html(response);
                }
            });
        }
    }
</script>