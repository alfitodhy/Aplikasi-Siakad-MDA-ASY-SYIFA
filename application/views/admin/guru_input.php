<div class="container-fluid">

    <?php if ($this->session->flashdata('message_error')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $this->session->flashdata('message_error'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <div class="card">
        <div class="card-header">
            <i class="fas fa-chalkboard-teacher mr-3"></i>Form Tambah Data Guru
        </div>
        <div class="card-body">
            <?= form_open_multipart() ?>
            <div class="form-group">
                <label for="nip">NIK</label>
                <input type="text" name="nip" id="nip" placeholder="Masukan NIK" class="form-control">
                <?php echo form_error('<div class="text-danger small ml-3">', '</div>') ?>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" placeholder="Masukan Nama" class="form-control">
                <?php echo form_error('nama', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>
            <div class="form-group">
                <label for="">Jenis Kelamin</label>
                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                    <option value="">--Pilih Jenis Kelamin--</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                <?php echo form_error('jenis_kelamin', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input placeholder="Masukan Tanggal Lahir" type="date" class="form-control datepicker" name="tanggal_lahir" id="tanggal_lahir">
                <?php echo form_error('tanggal_lahir', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>
            <div class="form-group">
                <label for="no_hp">No Handphone</label>
                <input type="text" name="no_hp" id="no_hp" placeholder="Masukan No Handphone" class="form-control">
                <?php echo form_error('no_hp', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" placeholder="Masukan Email" class="form-control">
                <?php echo form_error('email', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" placeholder="Masukan Alamat" class="form-control">
                <?php echo form_error('alamat', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>
            <div class="form-group">
                <label for="photo">Photo (ukuran 4x6 atau 2x3)</label>
                <input type="file" class="form-control-file" name="photo" id="photo">
                <small>(Biarkan kosong jika tidak ada)</small>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="reset" class="btn btn-secondary ml-1">Reset</button>
            <?= form_close() ?>
        </div>
    </div>
</div>

</main>