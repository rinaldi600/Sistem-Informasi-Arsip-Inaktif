<?= $this->extend('DashboardLayout/DashboardView') ?>

<?= $this->section('content') ?>

    <div class="settings-view col-lg-8">
        <div class="d-flex justify-content-between align-content-center">
            <div>
                <a class="btn btn-success mb-2" href="/settings">Back</a>
            </div>
        </div>
        <form action="/dataPassword" method="post">

            <?php if (session()->getFlashdata('success')) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>

            <input type="hidden" name="idUser" value="<?= $dataUser['id_user'] ?>">
            <div class="mb-3">
                <label for="password">Password Lama</label>
                <input type="password" class="form-control <?= session()->getFlashdata('password') ? 'is-invalid' : '' ?>" id="password" name="password">
                <div id="validationServer03Feedback" class="invalid-feedback">
                    <?= session()->getFlashdata('password') ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="passwordBaru">Password Baru</label>
                <input type="password" class="form-control <?= session()->getFlashdata('passwordBaru') ? 'is-invalid' : '' ?>" id="passwordBaru" name="passwordBaru">
                <div id="validationServer03Feedback" class="invalid-feedback">
                    <?= session()->getFlashdata('passwordBaru') ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="konfirmasiPasswordBaru">Konfirmasi Password Baru</label>
                <input type="password" class="form-control <?= session()->getFlashdata('konfirmasiPasswordBaru') ? 'is-invalid' : '' ?>" id="konfirmasiPasswordBaru" name="konfirmasiPasswordBaru">
                <div id="validationServer03Feedback" class="invalid-feedback">
                    <?= session()->getFlashdata('konfirmasiPasswordBaru') ?>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

<?= $this->endSection() ?>