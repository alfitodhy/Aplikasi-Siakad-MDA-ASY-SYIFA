<div class="container-fluid">
    <div class="card mb-5">
        <div class="card-header">
            <i class="fas fa-user-graduate mr-3"></i>Form Tambah Data Siswa
        </div>
        <div class="card-body">
            <?= form_open_multipart() ?>
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="card-title">Data Diri</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nis">NIS</label>
                                <input type="text" name="nis" id="nis" placeholder="Masukan NIS" class="form-control" value="<?php echo $siswa['nis']; ?>">
                                <?php echo form_error('nis', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label for="nisn">NISN</label>
                                <input type="text" name="nisn" id="nisn" placeholder="Masukan NISN" class="form-control" value="<?php echo $siswa['nisn']; ?>">
                                <?php echo form_error('nisn', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="nama" placeholder="Masukan Nama" class="form-control" value="<?php echo $siswa['nama']; ?>">
                                <?php echo form_error('nama', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" placeholder="Masukan Tanggal Lahir" class="form-control" value="<?php echo $siswa['tanggal_lahir']; ?>">
                                <?php echo form_error('tanggal_lahir', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label for="agama">Agama</label>
                                <input type="text" name="agama" id="agama" placeholder="Masukan Agama" class="form-control" value="<?php echo $siswa['agama']; ?>">
                                <?php echo form_error('agama', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                    <?php foreach ($jenis_kelamin as $jk) : ?>
                                        <?php if ($jk == $siswa['jenis_kelamin']) : ?>
                                            <option value="<?php echo $jk ?>" selected><?php echo $jk ?></option>
                                        <?php else : ?>
                                            <option value="<?php echo $jk ?>"><?php echo $jk ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('jenis_kelamin', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label for="photo">Photo (ukuran 4x6 atau 2x3)</label>
                                <?php if ($siswa['photo'] != null) : ?>
                                    <div class="mb-3">
                                        <img src="<?= base_url('assets/photos/' . $siswa['photo']) ?>" alt="photo <?= $siswa['nama'] ?>" style="max-width:200px; max-height:300px; object-fit: scale-down; object-position: center; border-radius: 8px;">
                                    </div>
                                <?php endif ?>
                                <input type="file" class="form-control-file" name="photo" id="photo">
                                <small>(Biarkan kosong jika tidak diganti)</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="card-title">Orang Tua</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_ibu">Nama Ibu</label>
                                <input type="text" name="nama_ibu" id="nama_ibu" placeholder="Masukan Nama Ibu" class="form-control" value="<?php echo $siswa['nama_ibu']; ?>">
                                <?php echo form_error('nama_ibu', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label for="pendidikan_ibu">Pendidikan Ibu</label>
                                <input type="text" name="pendidikan_ibu" id="pendidikan_ibu" placeholder="Masukan Pendidikan Ibu" class="form-control" value="<?php echo $siswa['pendidikan_ibu']; ?>">
                                <?php echo form_error('pendidikan_ibu', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                                <input type="text" name="pekerjaan_ibu" id="pekerjaan_ibu" placeholder="Masukan Pekerjaan Ibu" class="form-control" value="<?php echo $siswa['pekerjaan_ibu']; ?>">
                                <?php echo form_error('pekerjaan_ibu', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label for="nama_ayah">Nama Ayah</label>
                                <input type="text" name="nama_ayah" id="nama_ayah" placeholder="Masukan Nama Ayah" class="form-control" value="<?php echo $siswa['nama_ayah']; ?>">
                                <?php echo form_error('nama_ayah', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label for="pendidikan_ayah">Pendidikan Ayah</label>
                                <input type="text" name="pendidikan_ayah" id="pendidikan_ayah" placeholder="Masukan Pendidikan Ayah" class="form-control" value="<?php echo $siswa['pendidikan_ayah']; ?>">
                                <?php echo form_error('pendidikan_ayah', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                                <input type="text" name="pekerjaan_ayah" id="pekerjaan_ayah" placeholder="Masukan Pekerjaan Ayah" class="form-control" value="<?php echo $siswa['pekerjaan_ayah']; ?>">
                                <?php echo form_error('pekerjaan_ayah', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label for="no_hp">Nomor Handphone</label>
                                <input type="text" name="no_hp" id="no_hp" placeholder="Masukan Nomor Handphone" class="form-control" value="<?php echo $siswa['no_hp']; ?>">
                                <?php echo form_error('no_hp', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="card-title">Alamat</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="dusun">Dusun</label>
                                <input type="text" name="dusun" id="dusun" placeholder="Masukan Nama Dusun" class="form-control" value="<?php echo $siswa['dusun']; ?>">
                                <?php echo form_error('dusun', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label for="desa">Desa</label>
                                <input type="text" name="desa" id="desa" placeholder="Masukan Nama Desa" class="form-control" value="<?php echo $siswa['desa']; ?>">
                                <?php echo form_error('desa', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label for="kecamatan">Kecamatan</label>
                                <input type="text" name="kecamatan" id="kecamatan" placeholder="Masukan Kecamatan" class="form-control" value="<?php echo $siswa['kecamatan']; ?>">
                                <?php echo form_error('kecamatan', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label for="kabupaten">Kabupaten</label>
                                <input type="text" name="kabupaten" id="kabupaten" placeholder="Masukan Kabupaten" class="form-control" value="<?php echo $siswa['kabupaten']; ?>">
                                <?php echo form_error('kabupaten', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="reset" class="btn btn-secondary ml-1">Reset</button>
            <?= form_close() ?>
        </div>
    </div>
</div>

</main>