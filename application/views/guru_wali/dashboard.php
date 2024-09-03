<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> <i class="fas fa-tachometer-alt"></i> Dashboard</h1>
    </div>

    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Selamat Datang!</h4>
        <p>Selamat Datang <strong><?php echo $nama; ?></strong> di Sistem Informasi Pengolahan Data Madrasah Diniyah Awaliyah (MDA) ASY - SYIFA, Anda Login Sebagai <strong><?php echo $level; ?></strong></p>
        <hr>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#controlpanelModal">
            <i class="fas fa-landmark"></i> Menu
        </button>
    </div>

    <div class="row">
        <!-- Tahun Ajaran -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tahun Ajaran</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php if ($tahun) {
                                                                                    echo $tahun['nama'];
                                                                                } else {
                                                                                    echo 'Belum Ditentukan';
                                                                                } ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tahun Ajaran -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Semester</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php if ($tahun) {
                                                                                    echo $tahun['semester'];
                                                                                } else {
                                                                                    echo 'Belum Ditentukan';
                                                                                } ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Wali kelas -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Wali Kelas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $kelas['kelas'] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Siswa</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $siswa ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="controlpanelModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-landmark"></i> Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3 text-center">
                            <a href="<?php echo base_url('walikelas/profile') ?>" style="text-decoration:none">
                                <i class="fas fa-4x fa-user-circle text-info"></i>
                                <p class="nav-link small text-info">Profile</p>
                            </a>
                        </div>
                        <div class="col-md-3 text-info text-center">
                            <a href="<?php echo base_url('walikelas/nilai') ?>" style="text-decoration:none">
                                <i class="text-info fas fa-4x fa-sort-numeric-down"></i>
                                <p class="nav-link small text-info">Input Nilai</p>
                            </a>
                        </div>
                        <div class="col-md-3 text-info text-center">
                            <a href="<?php echo base_url('walikelas/laporansiswa') ?>" style="text-decoration:none">
                                <i class="text-info far fa-4x  fa-clipboard"></i>
                                <p class="nav-link small text-info">Laporan Daftar Siswa</p>
                            </a>
                        </div>
                        <div class="col-md-3 text-info text-center">
                            <a href="<?php echo base_url('walikelas/laporannilai') ?>" style="text-decoration:none">
                                <i class="text-info far fa-4x  fa-clipboard"></i>
                                <p class="nav-link small text-info">Laporan Daftar Nilai</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

</main>