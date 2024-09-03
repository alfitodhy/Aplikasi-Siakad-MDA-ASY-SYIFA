<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-book-open"></i> Data Matapelajaran</h1>
    </div>
    <?php if ($this->session->flashdata('message')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $this->session->flashdata('message'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <?php echo anchor('admin/mapel/input', '<button class="btn btn-sm btn-primary mb-3 mr-2"><i class="fas fa-plus fa-sm"></i> Tambah Data</button>') ?>

    <div class="card">
        <div class="card-body">
            <table class="table table-responsive table-striped table-bordered table-hover w-100 d-block d-md-table table-sm" id="table-mapel">
                <thead>
                    <tr>
                        <th width="20px">No</th>
                        <th>Mata Pelajaran</th>
                        <th>Level</th>
                        <th width="150px">Aksi</th>
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
    //onclick hapus data mapel
    function confirmDelete(id) {
        const href = '<?= site_url('admin/mapel/delete/') ?>' + id;

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "data mata pelajaran akan dihapus",
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
        $('#table-mapel').DataTable({
            "serverSide": true,
            "ajax": {
                "url": "<?= site_url('admin/mapel/get_result_mapel') ?>",
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