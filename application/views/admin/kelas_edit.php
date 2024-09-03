<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <i class="fas fa-chalkboard-teacher mr-3"></i>Form Update Data Kelas
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <input type="text" name="kelas" id="kelas" placeholder="Masukan Kelas" class="form-control" value="<?php echo $kelas['kelas']; ?>">
                    <?php echo form_error('kelas', '<div class="text-danger small ml-3">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label for="wali_kelas">Wali Kelas</label>
                    <select class="form-control" id="wali_kelas" name="wali_kelas">
                        <option value="<?= $kelas['wali_kelas'] . '-' . $get_user_id['id_user'] ?>" selected><?= $kelas['wali_kelas'] ?></option>
                        <?php foreach ($guru as $gr) : ?>
                            <option value="<?= $gr->nama . '-' . $gr->id_user ?>"><?php echo $gr->nama ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php echo form_error('wali_kelas', '<div class="text-danger small ml-3">', '</div>') ?>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-secondary ml-1">Reset</button>
            </form>
        </div>
    </div>
</div>

</main>