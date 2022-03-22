<?= $this->extend('DashboardLayout/DashboardView') ?>

<?= $this->section('content') ?>
<div class="kategori-view">

    <a class="btn btn-primary" href="/kategori_arsip/tambah_data">Tambah Data</a>
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
        <form action="/kategori_arsip" method="get">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Masukkan kategori" name="keyword">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
            </div>
        </form>
    </div>

    <div class="table-responsive col-lg-8">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Kategori</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php if (empty($dataKategori)) { ?>
                <td class="text-center" colspan="3">Data Kosong</td>
            <?php } else { ?>
                <?php $number = 1 ?>
                <?php foreach ($dataKategori as $kategori) { ?>
                    <tr>
                        <th scope="row"><?= $numberPagination++ ?></th>
                        <td><?= $kategori['kategori'] ?></td>
                        <td class="d-flex flex-wrap gap-2">
                            <a class="btn btn-warning" href="/kategori_arsip/edit/<?= $kategori['id_kategori_arsip'] ?>">Edit</a>
                            <form action="/hapusDataKategori" method="post">
                                <input type="hidden" value="<?= $kategori['id_kategori_arsip'] ?>" name="idKategori">
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
        <?= $pager->links('tbl_kategori_arsip', 'front_full') ?>
    </div>
</div>
<?= $this->endSection() ?>
