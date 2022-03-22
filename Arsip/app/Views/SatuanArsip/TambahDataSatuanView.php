<?= $this->extend('DashboardLayout/DashboardView') ?>

<?= $this->section('content') ?>

<div class="retensi-view col-lg-8">
    <a class="btn btn-success mb-2" href="/satuan_arsip">Back</a>
    <form action="/getDataSatuan" method="post">
        <?php if (session()->getFlashdata('success')) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>

        <div class="mb-3">
            <label for="namaSatuan" class="form-label">Nama Satuan</label>
            <input type="text" class="form-control <?= session()->getFlashdata('namaSatuan') ? 'is-invalid' : '' ?>" id="namaSatuan" name="namaSatuan" value="<?= old('namaSatuan') ?>">
            <div id="validationServer04Feedback" class="invalid-feedback">
                <?= session()->getFlashdata('namaSatuan') ?>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?= $this->endSection() ?>

