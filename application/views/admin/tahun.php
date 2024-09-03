<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-calendar"></i> Data Tahun Ajaran</h1>
    </div>
    <?php if ($this->session->flashdata('message')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $this->session->flashdata('message'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <?php echo anchor('admin/tahunajaran/input', '<button class="btn btn-sm btn-primary mb-3 mr-2"><i class="fas fa-plus fa-sm"></i> Tambah Data</button>') ?>

    <div class="card">
        <div class="card-body">
            <table class="table table-responsive-sm table-bordered table-striped table-sm w-100 d-block d-md-table" id="table-tahun">
                <thead>
                    <tr>
                        <th width="20px">No</th>
                        <th>Tahun Ajaran</th>
                        <th>Semester</th>
                        <th>Bagikan Ke Orang Tua</th>
                        <th class="text-center" width="200px">Status</th>
                        <th class="text-center" width="100px">Aksi</th>
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
    //onclick hapus data tahun
    function confirmDelete(id) {
        const href = '<?= site_url('admin/tahunajaran/delete/') ?>' + id;

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "data tahun ajaran akan dihapus",
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
        $('#table-tahun').DataTable({
            "serverSide": true,
            "ajax": {
                "url": "<?= site_url('admin/tahunajaran/get_result_tahun') ?>",
                "type": "POST"
            },
            "columnDefs": [{
                    "targets": [0, -1, -2],
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