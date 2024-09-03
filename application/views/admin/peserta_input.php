<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <i class="fas fa-users mr-3"></i>Form Tambah Data Peserta Didik
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="tahun">Tahun Ajaran</label>
                    <input type="text" name="tahun" id="tahun" placeholder="Masukan Tahun Ajaran" class="form-control" value="<?= $tahun['nama'] ?>" disabled>
                    <?php echo form_error('tahun', '<div class="text-danger small ml-3">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <select class="form-control" id="kelas" name="kelas">
                        <option value="">--Pilih Kelas--</option>
                        <?php foreach ($kelas as $kl) : ?>
                            <option value="<?php echo $kl->id_kelas ?>"><?= $kl->kelas ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php echo form_error('kelas', '<div class="text-danger small ml-3">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="siswa">Siswa</label>
                    <div class="">
                        <select class="form-control" id="siswa" name="siswa[]" size="20" multiple="">
                            <option value="">NIS - NISN - Nama Siswa</option>
                            <?php foreach ($siswa as $sw) : ?>
                                <option value="<?php echo $sw->id_siswa ?>"><?= "$sw->nis - $sw->nisn - $sw->nama" ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php echo form_error('siswa[]', '<div class="text-danger small ml-3">', '</div>') ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-secondary ml-1">Reset</button>
            </form>
        </div>
    </div>
</div>
</main>