<?= $this->extend('DashboardLayout/DashboardView') ?>

<?= $this->section('content') ?>
<div class="satuan-view">
    <a class="btn btn-primary" href="/satuan_arsip/tambah_data">Tambah Data</a>

    <?php if (session()->getFlashdata('success')) { ?>
        <div class="alert alert-success alert-dismissible fade show col-lg-8 mt-3" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>

    <?php if (session()->getFlashdata('fails')) { ?>
        <div class="alert alert-danger alert-dismissible fade show col-lg-8 mt-3" role="alert">
            <?= session()->getFlashdata('fails') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>

    <div class="col-lg-8 mb-3 mt-3">
        <form action="/satuan_arsip" method="get">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Masukkan nama" name="keyword">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
            </div>
        </form>
    </div>

    <div class="table-responsive col-lg-8">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php if (empty($dataSatuan)) { ?>
                <td class="text-center" colspan="5">Data Kosong</td>
            <?php } else { ?>
                <?php foreach ($dataSatuan as $satuan) { ?>
                    <tr>
                        <th scope="row"><?= $numberPagination++ ?></th>
                        <td><?= $satuan['nama_satuan'] ?></td>
                        <td class="d-flex flex-wrap gap-2">
                            <a class="btn btn-warning" href="/satuan_arsip/edit/<?= $satuan['id_satuan'] ?>">Edit</a>
                            <form action="/hapusDataSatuan" method="post">
                                <input type="hidden" value="<?= $satuan['id_satuan'] ?>" name="idSatuan">
                                <button onclick="return confirm('Apakah anda ingin menghapus ?')" class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="d-flex flex-wrap mt-3">
        <?= $pager->links('tbl_satuan', 'front_full') ?>
    </div>
</div>
<?= $this->endSection() ?>

