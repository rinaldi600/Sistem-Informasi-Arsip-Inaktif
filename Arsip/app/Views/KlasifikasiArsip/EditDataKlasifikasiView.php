<?= $this->extend('DashboardLayout/DashboardView') ?>

<?= $this->section('content') ?>

    <div class="klasifikasi-view col-lg-8">
        <a class="btn btn-success mb-2" href="/klasifikasi_arsip">Back</a>
        <form action="/dataEditKlasifikasi" method="post">
            <?php if (session()->getFlashdata('success')) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>

            <input type="hidden" name="idKlasifikasi" value="<?= $detailKlasifikasi['id_klasifikasi'] ?>">
            <div class="mb-3">
                <label for="kode" class="form-label">Kode</label>
                <input type="text" class="form-control <?= session()->getFlashdata('kode') ? 'is-invalid' : '' ?>" id="kode" name="kode" value="<?= old('kode') ?? $detailKlasifikasi['kode'] ?>">
                <div id="validationServer04Feedback" class="invalid-feedback">
                    <?= session()->getFlashdata('kode') ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control <?= session()->getFlashdata('nama') ? 'is-invalid' : '' ?>" id="nama" name="nama" value="<?= old('nama') ?? $detailKlasifikasi['nama_klasifikasi'] ?>">
                <div id="validationServer04Feedback" class="invalid-feedback">
                    <?= session()->getFlashdata('nama') ?>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

<?= $this->endSection() ?>