<?= $this->extend('DashboardLayout/DashboardView') ?>

<?= $this->section('content') ?>

    <div class="settings-view col-lg-8">
        <div class="d-flex justify-content-between align-content-center">
            <div>
                <a class="btn btn-success mb-2" href="/settings">Back</a>
            </div>
            <div>
                <a class="btn btn-primary mb-2" href="/settings/password_ubah">Ubah Password</a>
            </div>
        </div>
        <form action="/dataUser" method="post">

            <?php if (session()->getFlashdata('success')) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>

            <?php if (session()->getFlashdata('fails')) { ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('fails') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>
            <input type="hidden" name="oldUsername" value="<?= $dataUser['username'] ?>">
            <input type="hidden" name="idUser" value="<?= $dataUser['id_user'] ?>">
            <div class="mb-3">
                <label for="nama">Nama</label>
                <input type="text" class="form-control <?= session()->getFlashdata('nama') ? 'is-invalid' : '' ?>" id="nama" name="nama" value="<?= old('nama') ?? $dataUser['nama'] ?>">

                <div id="validationServer03Feedback" class="invalid-feedback">
                    <?= session()->getFlashdata('nama') ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="username">Username</label>
                <input type="text" class="form-control <?= session()->getFlashdata('username') ? 'is-invalid' : '' ?>" id="username" name="username" value="<?= old('username') ?? $dataUser['username'] ?>">
                <div id="validationServer03Feedback" class="invalid-feedback">
                    <?= session()->getFlashdata('username') ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="bidang">Bidang</label>
                <input type="text" class="form-control <?= session()->getFlashdata('bidang') ? 'is-invalid' : '' ?>" id="bidang" name="bidang" value="<?= old('bidang') ?? $dataUser['bidang'] ?>">
                <div id="validationServer03Feedback" class="invalid-feedback">
                    <?= session()->getFlashdata('bidang') ?>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

<?= $this->endSection() ?>