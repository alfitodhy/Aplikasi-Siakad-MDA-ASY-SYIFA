<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-user-circle"></i> Profile</h1>
    </div>
    <?php if ($this->session->flashdata('message')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $this->session->flashdata('message'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3" class="text-center">
                    <h6 class="text-dark font-weight-bold">Foto Guru</h6>
                    <div id="photo" class="mb-3">
                        <?php if ($guru['photo']) : ?>
                            <img src="<?= base_url('assets/photos/' . $guru['photo']) ?>" alt="photo <?= $guru['nama'] ?>" style="width: 200px; height: 300px; border-radius: 15px;">
                        <?php else : ?>
                            <img src="<?= base_url('assets/photos/user-placeholder.jpg') ?>" alt="photo <?= $guru['nama'] ?>" style="width: 200px; height: 300px; border-radius: 15px;">
                        <?php endif ?>
                    </div>
                </div>
                <div class="col-sm-9">
                    <h6 class="text-dark font-weight-bold">Data Diri</h6>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-borderless no-margin table-striped">
                                <tr>
                                    <th class="text-left">NIK</th>
                                    <td><span id="nip"><?= $guru['nip'] ?></span></td>
                                </tr>
                                <tr>
                                    <th class="text-left">Nama</th>
                                    <td><span id="nama"><?= $guru['nama'] ?></span></td>
                                </tr>
                                <tr>
                                    <th class="text-left">Jenis Kelamin</th>
                                    <td><span id="jenis-kelamin"><?= $guru['jenis_kelamin'] ?></span></td>
                                </tr>
                                <tr>
                                    <th class="text-left">Tanggal Lahir</th>
                                    <td><span id="tanggal-lahir"><?= $guru['tanggal_lahir'] ?></span></td>
                                </tr>
                                <tr>
                                    <th class="text-left">No. Handphone</th>
                                    <td><span id="no-hp"><?= $guru['no_hp'] ?></span></td>
                                </tr>
                                <tr>
                                    <th class="text-left">Email</th>
                                    <td><span id="email"><?= $guru['email'] ?></span></td>
                                </tr>
                                <tr>
                                    <th class="text-left">Alamat</th>
                                    <td><span id="alamat"><?= $guru['alamat'] ?></span></td>
                                </tr>
                            </table>

                            <?= anchor('guru/profile/password', '<div class="btn btn-sm btn-primary  mr-1 ml-1 mb-1"><i class="fa fa-lock"></i> Ganti Password</div>') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</main>