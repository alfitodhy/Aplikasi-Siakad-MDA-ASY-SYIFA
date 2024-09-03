<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <i class="fas fa-calendar mr-3"></i>Form Tambah Tahun Ajaran
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="nama">Tahun Ajaran</label>
                    <input type="text" name="nama" id="nama" placeholder="Masukan Tahun Ajaran" class="form-control">
                    <?php echo form_error('nama', '<div class="text-danger small ml-3">', '</div>') ?>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-secondary ml-1">Reset</button>
            </form>
        </div>
    </div>
</div>

</main>