<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-lock"></i> Ganti Password</h1>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="password">Password Baru</label>
                    <input type="password" name="password" id="password" placeholder="Masukan Password Baru" class="form-control">
                    <?php echo form_error('password', '<div class="text-danger small ml-3">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label for="konfirmasi">Konfirmasi Password Baru</label>
                    <input type="password" name="konfirmasi" id="konfirmasi" placeholder="Masukan Konfirmasi Password Baru" class="form-control">
                    <?php echo form_error('konfirmasi', '<div class="text-danger small ml-3">', '</div>') ?>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-secondary ml-1">Reset</button>
            </form>
        </div>
    </div>
</div>
</main>