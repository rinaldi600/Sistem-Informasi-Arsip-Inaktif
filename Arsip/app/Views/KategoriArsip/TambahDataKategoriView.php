<?= $this->extend('DashboardLayout/DashboardView') ?>

<?= $this->section('content') ?>

<div class="kategori-view col-lg-8">
    <a class="btn btn-success mb-2" href="/kategori_arsip">Back</a>
    <form action="/getDataKategori" method="post">
        <?php if (session()->getFlashdata('success')) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <input type="text" class="form-control <?= session()->getFlashdata('kategori') ? 'is-invalid' : '' ?>" id="kategori" name="kategori" value="<?= old('kategori') ?>">
            <div id="validationServer04Feedback" class="invalid-feedback">
                <?= session()->getFlashdata('kategori') ?>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?= $this->endSection() ?>