<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-user-circle"></i> Data Diri</h1>
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
                        <?php if ($siswa['photo']) : ?>
                            <img src="<?= base_url('assets/photos/' . $siswa['photo']) ?>" alt="photo <?= $siswa['nama'] ?>" style="width: 200px; height: 300px; border-radius: 15px;">
                        <?php else : ?>
                            <img src="<?= base_url('assets/photos/user-placeholder.jpg') ?>" alt="photo <?= $siswa['nama'] ?>" style="width: 200px; height: 300px; border-radius: 15px;">
                        <?php endif ?>
                    </div>
                </div>
                <div class="col-sm-9">
                    <h6 class="text-dark font-weight-bold">Data Diri</h6>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-borderless no-margin table-striped">
                                <tr>
                                    <th class="text-left" width="150px">NIS</th>
                                    <td><span id="nis">: <?= $siswa['nis'] ?></span></td>
                                </tr>
                                <tr>
                                    <th class="text-left" width="150px">NISN</th>
                                    <td><span id="nisn">: <?= $siswa['nisn'] ?></span></td>
                                </tr>
                                <tr>
                                    <th class="text-left" width="150px">Nama</th>
                                    <td><span id="nama">: <?= $siswa['nama'] ?></span></td>
                                </tr>
                                <tr>
                                    <th class="text-left" width="150px">Jenis Kelamin</th>
                                    <td><span id="jenis-kelamin">: <?= $siswa['jenis_kelamin'] ?></span></td>
                                </tr>
                                <tr>
                                    <th class="text-left" width="150px">Tanggal Lahir</th>
                                    <td><span id="tanggal-lahir">: <?= $siswa['tanggal_lahir'] ?></span></td>
                                </tr>
                                <tr>
                                    <th class="text-left" width="150px">Agama</th>
                                    <td><span id="agama">: <?= $siswa['agama'] ?></span></td>
                                </tr>
                            </table>
                            <?= anchor('siswa/datadiri/password', '<div class="btn btn-sm btn-primary  mr-1 ml-1 mb-1"><i class="fa fa-lock"></i> Ganti Password</div>') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3" class="text-center"></div>
                <div class="col-sm-9">
                    <h6 class="text-dark font-weight-bold">Data Orang Tua</h6>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-borderless no-margin table-striped">
                                <tr>
                                    <th class="text-left" width="150px">Nama Ayah</th>
                                    <td><span id="nama_ayah">: <?= $siswa['nama_ayah'] ?></span></td>
                                </tr>
                                <tr>
                                    <th class="text-left" width="150px">Pendidikan Ayah</th>
                                    <td><span id="pendidikan_ayah">: <?= $siswa['pendidikan_ayah'] ?></span></td>
                                </tr>
                                <tr>
                                    <th class="text-left" width="150px">Pekerjaan Ayah</th>
                                    <td><span id="pekerjaan_ayah">: <?= $siswa['pekerjaan_ayah'] ?></span></td>
                                </tr>
                                <tr>
                                    <th class="text-left" width="150px">Nama Ibu</th>
                                    <td><span id="nama_ibu">: <?= $siswa['nama_ibu'] ?></span></td>
                                </tr>
                                <tr>
                                    <th class="text-left" width="150px">Pendidikan Ibu</th>
                                    <td><span id="pendidikan_ibu">: <?= $siswa['pendidikan_ibu'] ?></span></td>
                                </tr>
                                <tr>
                                    <th class="text-left" width="150px">Pekerjaan Ibu</th>
                                    <td><span id="pekerjaan_ibu">: <?= $siswa['pekerjaan_ibu'] ?></span></td>
                                </tr>
                                <tr>
                                    <th class="text-left" width="150px">No. Handphone</th>
                                    <td><span id="no_hp">: <?= $siswa['no_hp'] ?></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3" class="text-center"></div>
                <div class="col-sm-9">
                    <h6 class="text-dark font-weight-bold">Alamat</h6>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-borderless no-margin table-striped">
                                <tr>
                                    <th class="text-left" width="150px">Alamat</th>
                                    <td><span id="dusun">: <?= $siswa['dusun'] ?></span></td>
                                </tr>
                                <tr>
                                    <th class="text-left" width="150px">Provinsi</th>
                                    <td><span id="desa">: <?= $siswa['desa'] ?></span></td>
                                </tr>
                                <tr>
                                    <th class="text-left" width="150px">Kecamatan</th>
                                    <td><span id="kecamatan">: <?= $siswa['kecamatan'] ?></span></td>
                                </tr>
                                <tr>
                                    <th class="text-left" width="150px">Kelurahan</th>
                                    <td><span id="kabupaten">: <?= $siswa['kabupaten'] ?></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</main>