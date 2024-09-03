<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-chalkboard"></i> Data Kelas</h1>
    </div>
    <?php if ($this->session->flashdata('message')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $this->session->flashdata('message'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <?php echo anchor('admin/kelas/input', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Data</button>') ?>

    <div class="card">
        <div class="card-body">
            <table class="table table-responsive-sm table-bordered table-striped table-sm w-100 d-block d-md-table" id="table-kelas">
                <thead>
                    <tr>
                        <th class="text-center" width="20px">No</th>
                        <th width="100px">Kelas</th>
                        <th>Wali Kelas</th>
                        <th class="text-center" width="120px">Aksi</th>
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
    //onclick hapus data kelas
    function confirmDelete(id) {
        console.log(id);
        const href = '<?= site_url('admin/kelas/delete/') ?>' + id;

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "data kelas akan dihapus",
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
        $('#table-kelas').DataTable({
            "serverSide": true,
            "ajax": {
                "url": "<?= site_url('admin/kelas/get_result_kelas') ?>",
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