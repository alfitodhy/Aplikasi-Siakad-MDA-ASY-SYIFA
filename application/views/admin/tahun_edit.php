<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <i class="fas fa-calendar mr-3"></i>Form Tambah Tahun Ajaran
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="nama">Tahun Ajaran</label>
                    <input type="text" name="nama" id="nama" placeholder="Masukan Tahun Ajaran" class="form-control" value="<?php echo $tahun['nama'] ?>">
                    <?php echo form_error('nama', '<div class="text-danger small ml-3">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Semester</label>
                    <select class="form-control" id="semester" name="semester">
                        <?php foreach ($semester as $st) : ?>
                            <?php if ($st == $tahun['semester']) : ?>
                                <option value="<?= $st ?>" selected><?= $st ?></option>
                            <?php else : ?>
                                <option value="<?= $st ?>"><?= $st ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                    <?php echo form_error('semester', '<div class="text-danger small ml-3">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Bagikan ke Orang Tua</label>
                    <select class="form-control" id="shared" name="shared">
                        <?php foreach ($shared as $st) : ?>
                            <?php if ($st == $tahun['shared']) : ?>
                                <option value="<?= $st ?>" selected><?= ($st == '0') ? 'Tidak' : 'Ya'; ?></option>
                            <?php else : ?>
                                <option value="<?= $st ?>"><?= ($st == '0') ? 'Tidak' : 'Ya'; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                    <?php echo form_error('shared', '<div class="text-danger small ml-3">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Status</label>
                    <select class="form-control" id="status" name="status">
                        <?php foreach ($status as $st) : ?>
                            <?php if ($st == $tahun['status']) : ?>
                                <option value="<?php echo $st ?>" selected><?= ($st == '0') ? 'Tidak Aktif' : 'Aktif'; ?></option>
                            <?php else : ?>
                                <option value="<?php echo $st ?>"><?= ($st == '0') ? 'Tidak Aktif' : 'Aktif'; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                    <?php echo form_error('status', '<div class="text-danger small ml-3">', '</div>') ?>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-secondary ml-1">Reset</button>
            </form>
        </div>
    </div>
</div>

</main>