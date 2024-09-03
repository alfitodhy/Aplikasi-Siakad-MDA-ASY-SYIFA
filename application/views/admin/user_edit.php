<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <i class="fas fa-users mr-3"></i>Form update data <?= $levels ?>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" placeholder="Masukan Username" class="form-control" value="<?= $user['username']; ?>" disabled>
                    <?php echo form_error('username', '<div class="text-danger small ml-3">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Status</label>
                    <select class="form-control" id="status" name="status">
                        <?php foreach ($status as $st) : ?>
                            <?php if ($st == $user['status']) : ?>
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