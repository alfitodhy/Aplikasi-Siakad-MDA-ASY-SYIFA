<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-book-open"></i> <?= $mapel['nama_mapel'] . ' / Level ' . $mapel['level'] ?></h1>
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
            <form action="" method="post">
                <div class="form-group">
                    <label for="komp_dasar">Tambah Kompetensi Dasar</label>
                    <!-- <input type="text" name="komp_dasar" id="komp_dasar" placeholder="Masukan Kompetensi Dasar" class="form-control"> -->
                    <div class="input-group control-group after-add-kd">
                        <input type="text" name="kd[]" class="form-control" id="komp_dasar" placeholder="Masukan Kompetensi Dasar">
                        <div class="input-group-btn">
                            <button class="btn btn-primary add-kd" type="button"> <i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                    <?php echo form_error('kd[]', '<div class="text-danger small ml-3">', '</div>') ?>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
                <button type="reset" class="btn btn-secondary ml-1">Reset</button>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-responsive table-striped table-bordered table-hover w-100 d-block d-md-table table-sm">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kompetensi Dasar</th>
                        <th class="text-center" width="100px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $name_kd = '';
                    $no = 0; ?>
                    <?php foreach ($komp_dasar as $key => $value) : ?>
                        <?php if ($name_kd !== $value->nama_kd) : ?>
                            <tr>
                                <td><?= ++$no ?></td>
                                <td><?= $value->nama_kd ?></td>
                                <td class="text-center"><a href="<?= base_url(); ?>admin/mapel/delete_kd?id_mapel=<?= $mapel['id_mapel'] ?>&kd=<?= $value->nama_kd ?>" class="btn btn-sm btn-danger btn-xs mr-1 ml-1 mb-1 btn-delete-kd"><i class="fa fa-trash"></i></a></td>
                            </tr>
                        <?php endif; ?>
                        <?php $name_kd = $value->nama_kd; ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- form add kd -->
    <div class="kd-copy invisible">
        <div class="input-group control-group mt-2">
            <input type="text" name="kd[]" class="form-control" id="komp_dasar_add" placeholder="Masukan Kompetensi Dasar">
            <div class="input-group-btn">
                <button class="btn btn-danger remove-kd" type="button"><i class="fa fa-trash"></i></button>
            </div>
        </div>
    </div>
</div>

</main>

<script>
    $(document).ready(function() {
        $(".add-kd").click(function() {
            var html = $(".kd-copy").html();
            $(".after-add-kd").after(html);
        });
        $("body").on("click", ".remove-kd", function() {
            $(this).parents(".control-group").remove();
        });
    });

    // Hapus data kd
    $('.btn-delete-kd').on('click', function(event) {
        event.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "data kompetensi dasar akan dihapus",
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
    });
</script>