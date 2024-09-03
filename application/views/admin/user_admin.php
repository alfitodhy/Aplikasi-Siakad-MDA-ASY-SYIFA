<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <i class="fas fa-users mr-3"></i>Form update data <?= $level ?>
        </div>
        <div class="card-body">
            <?= form_open_multipart() ?>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Masukan Username" class="form-control" value="<?= $admin['username']; ?>">
                <?php echo form_error('username', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>
            <div class="form-group">
                <label for="">Status</label>
                <select class="form-control" id="status" name="status">
                    <?php foreach ($status as $st) : ?>
                        <?php if ($st == $admin['status']) : ?>
                            <option value="<?php echo $st ?>" selected><?= ($st == '0') ? 'Tidak Aktif' : 'Aktif'; ?></option>
                        <?php else : ?>
                            <option value="<?php echo $st ?>"><?= ($st == '0') ? 'Tidak Aktif' : 'Aktif'; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
                <?php echo form_error('status', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>
            <div class="form-group">
                <label for="nip">NIK</label>
                <input type="text" name="nip" id="nip" placeholder="Masukan NIP" class="form-control" value="<?= $admin['nip'] ?>">
                <?php echo form_error('nip', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" placeholder="Masukan Nama" class="form-control" value="<?= $admin['nama'] ?>">
                <?php echo form_error('nama', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>
            <div class="form-group">
                <label for="">Jenis Kelamin</label>
                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                    <?php foreach ($jenis_kelamin as $jk) : ?>
                        <?php if ($jk == $admin['jenis_kelamin']) : ?>
                            <option value="<?php echo $jk ?>" selected><?php echo $jk ?></option>
                        <?php else : ?>
                            <option value="<?php echo $jk ?>"><?php echo $jk ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
                <?php echo form_error('jenis_kelamin', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input placeholder="Masukan Tanggal Lahir" type="date" class="form-control datepicker" name="tanggal_lahir" id="tanggal_lahir" value="<?= $admin['tanggal_lahir'] ?>">
                <?php echo form_error('tanggal_lahir', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>
            <div class="form-group">
                <label for="no_hp">No Handphone</label>
                <input type="text" name="no_hp" id="no_hp" placeholder="Masukan No Handphone" class="form-control" value="<?= $admin['no_hp'] ?>">
                <?php echo form_error('no_hp', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" placeholder="Masukan Email" class="form-control" value="<?= $admin['email'] ?>">
                <?php echo form_error('email', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" placeholder="Masukan Alamat" class="form-control" value="<?= $admin['alamat'] ?>">
                <?php echo form_error('alamat', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>
            <div class="form-group">
                <label for="photo">Photo (ukuran 4x6 atau 2x3)</label>
                <?php if ($admin['photo'] != null) : ?>
                    <div class="mb-3">
                        <img src="<?= base_url('assets/photos/' . $admin['photo']) ?>" alt="photo <?= $admin['nama'] ?>" style="max-width:200px; max-height:300px; object-fit: scale-down; object-position: center; border-radius: 8px;">
                    </div>
                <?php endif ?>
                <input type="file" class="form-control-file" name="photo" id="photo">
                <small>(Biarkan kosong jika tidak diganti)</small>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="reset" class="btn btn-secondary ml-1">Reset</button>
            <?= form_close() ?>
        </div>
    </div>
</div>

</main>