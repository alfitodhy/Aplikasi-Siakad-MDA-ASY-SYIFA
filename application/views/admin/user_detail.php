<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-users"></i> Data user <?= $levels ?></h1>
    </div>
    <?php if ($this->session->flashdata('message')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $this->session->flashdata('message'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <?php if ($levels == 'admin') echo anchor('admin/user/input', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Data</button>') ?>

    <div class="card">
        <div class="card-body">
            <table class="table table-responsive-sm table-bordered table-striped table-sm w-100 d-block d-md-table" id="table-user">
                <thead>
                    <tr>
                        <th width="20px">No</th>
                        <th>Nama</th>
                        <th>Username / NIS / Email</th>
                        <th>Level</th>
                        <th width="120px" class="text-center">Status</th>
                        <th width="160px">Aksi</th>
                        <!-- <?= ($levels == 'admin') ? '<th class="text-center" colspan="3">Aksi</th>' : '<th class="text-center" colspan="2">Aksi</th>'; ?> -->
                    </tr>
                </thead>

                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Detal Modal -->
<div class="modal fade detailModal" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detalModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark font-weight-bold">Admin : <span id="namasiswa"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4" class="text-center">
                            <h6 class="text-dark font-weight-bold">Foto Admin</h6>
                            <div id="photo" class="mb-3"></div>
                        </div>
                        <div class="col-sm-8">
                            <h6 class="text-dark font-weight-bold">Data Diri</h6>
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-borderless no-margin">
                                        <tr>
                                            <th>NIK</th>
                                            <td><span id="nip"></span></td>
                                        </tr>
                                        <tr>
                                            <th>Nama</th>
                                            <td><span id="nama"></span></td>
                                        </tr>
                                        <tr>
                                            <th>Jenis Kelamin</th>
                                            <td><span id="jenis-kelamin"></span></td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Lahir</th>
                                            <td><span id="tanggal-lahir"></span></td>
                                        </tr>
                                        <tr>
                                            <th>No. Handphone</th>
                                            <td><span id="no-hp"></span></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td><span id="email"></span></td>
                                        </tr>
                                        <tr>
                                            <th>Alamat</th>
                                            <td><span id="alamat"></span></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-primary text-white" id="edit-siswa">Edit</a>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

</main>
<script>
    //onclick hapus data user
    function confirmDelete(id) {
        const href = '<?= site_url('admin/user/delete/' . $levels . '/') ?>' + id;
        console.log(href);

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "data user akan dihapus",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus Data',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
            }
        });
    }

    //datatables
    $(document).ready(function() {
        $('#table-user').DataTable({
            "serverSide": true,
            "ajax": {
                "url": "<?= site_url('admin/user/get_result_user/' . $id) ?>",
                "type": "POST"
            },
            "columnDefs": [{
                    "targets": [0, 3, -1, -2],
                    "className": 'text-center'
                },
                {
                    "targets": [-1],
                    "orderable": false
                }
            ]
        });
    });

    // Detail modal siswa
    $(document).ready(function() {
        $(document).on('click', '#set_detailModal', function() {
            const idadmin = $(this).data('idadmin');
            const level = $(this).data('level');
            const nip = $(this).data('nip');
            const nama = $(this).data('nama');
            const jeniskelamin = $(this).data('jeniskelamin');
            const tanggallahir = $(this).data('tanggallahir');
            const nohp = $(this).data('nohp');
            const email = $(this).data('email');
            const alamat = $(this).data('alamat');
            const photo = $(this).data('photo');
            const isPhoto = photo !== '' ? photo : 'user-placeholder.jpg';
            const href = '<?= base_url('admin/user/edit/') ?>' + level + '/' + idadmin;
            const url_photo = '<?= base_url('assets/photos/') ?>' + isPhoto;

            console.log(photo)

            $('#nip').text(nip);
            $('#nama').text(nama);
            $('#jenis-kelamin').text(jeniskelamin);
            $('#tanggal-lahir').text(tanggallahir);
            $('#no-hp').text(nohp);
            $('#email').text(email);
            $('#alamat').text(alamat);
            $('#photo').html(`<img src="${url_photo}" alt="photo ${nama}" style="max-width:200px; max-height:300px; object-fit: scale-down; object-position: center; border-radius: 15px;">`)

            $(document).on('click', '#edit-siswa', function() {
                document.location.href = href;
            });

        });
    });
</script>