<?= $this->extend('DashboardLayout/DashboardView') ?>

<?= $this->section('content') ?>

<div class="retensi-view col-lg-8">
    <a class="btn btn-success mb-2" href="/retensi_arsip">Back</a>
    <form action="/getDataRetensi" method="post">
        <?php if (session()->getFlashdata('success')) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>

        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control <?= session()->getFlashdata('judul') ? 'is-invalid' : '' ?>" id="judul" name="judul" value="<?= old('judul') ?>">
            <div id="validationServer04Feedback" class="invalid-feedback">
                <?= session()->getFlashdata('judul') ?>
            </div>
        </div>

        <div class="mb-3">
            <label for="tahunAksi" class="form-label">Tahun Aksi</label>
            <input type="text" class="form-control <?= session()->getFlashdata('tahunAksi') ? 'is-invalid' : '' ?>" id="tahunAksi" name="tahunAksi" value="<?= old('tahunAksi') ?>" placeholder="Berapa Tahun">
            <div id="validationServer04Feedback" class="invalid-feedback">
                <?= session()->getFlashdata('tahunAksi') ?>
            </div>
        </div>

        <div class="mb-3">
            <label for="keteranganAksi" class="form-label">keterangan Aksi</label>
            <input type="text" class="form-control <?= session()->getFlashdata('keteranganAksi') ? 'is-invalid' : '' ?>" id="keteranganAksi" name="keteranganAksi" value="<?= old('keteranganAksi') ?>">
            <div id="validationServer04Feedback" class="invalid-feedback">
                <?= session()->getFlashdata('tahunAksi') ?>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?= $this->endSection() ?>
