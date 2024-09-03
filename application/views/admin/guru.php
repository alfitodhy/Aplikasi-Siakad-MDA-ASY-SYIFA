<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> <i class="fas fa-chalkboard-teacher"></i> Data Guru</h1>
    </div>
    <?php if ($this->session->flashdata('message')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $this->session->flashdata('message'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <?php echo anchor('admin/guru/input', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Data</button>') ?>
    <div class="card">
        <div class="card-body">
            <table class="table table-responsive-sm table-bordered table-striped table-sm w-100 d-block d-md-table" id="table-guru">
                <thead>
                    <tr>
                        <th class="text-center" style="vertical-align : middle;text-align:center;">No</th>
                        <th style="vertical-align : middle;text-align:center;">NIK</th>
                        <th style="vertical-align : middle;text-align:center;">Nama</th>
                        <th style="vertical-align : middle;text-align:center;">Jenis Kelamin</th>
                        <th style="vertical-align : middle;text-align:center;">Tanggal Lahir</th>
                        <th style="vertical-align : middle;text-align:center;">No Handphone</th>
                        <th style="vertical-align : middle;text-align:center;">Email</th>
                        <th style="vertical-align : middle;text-align:center;">Foto</th>
                        <th style="vertical-align : middle;text-align:center;">Alamat</th>
                        <th class="text-center" width="80px" style="vertical-align : middle;text-align:center;">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                </tbody>
            </table>
        </div>




    </div>
</div>

</main>


<script>
    //onclick hapus data guru
    function confirmDelete(id) {
        const href = '<?= site_url('admin/guru/delete/') ?>' + id;

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "data guru akan dihapus",
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
        $('#table-guru').DataTable({
            "serverSide": true,
            "ajax": {
                "url": "<?= site_url('admin/guru/get_result_guru') ?>",
                "type": "POST"
            },
            "columnDefs": [{
                    "targets": [0, -1],
                    "className": 'text-center'
                },
                {
                    "targets": [-1],
                    "orderable": false
                }
            ]
        });
    });
</script>