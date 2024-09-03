<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> <i class="fas fa-tachometer-alt"></i> Dashboard</h1>
    </div>

    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Selamat Datang!</h4>
        <p>Selamat Datang Orang Tua dari <strong><?php echo $nama; ?></strong> di Sistem Informasi Pengolahan Data MADRASAH DINIYAH AWALIYAH (MDA) ASY - SYIFA</p>
        <hr>
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
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Kelas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $nama_kelas = ($kelas) ? $kelas['kelas'] : 'Belum Ditentukan'; ?></div>
                        </div>
                        <div class="col-auto ">
                            <i class="fas fa-chalkboard fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Wali Kelas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $nama_wali = ($kelas) ? $kelas['wali_kelas'] : 'Belum Ditentukan'; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</main>