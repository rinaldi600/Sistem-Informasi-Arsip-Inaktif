<?= $this->extend('DashboardLayout/DashboardView') ?>

<?= $this->section('content') ?>

<div class="inaktif-view col-lg-8">
    <a class="btn btn-success mb-2" href="/inaktif_arsip">Back</a>
    <form action="/getDataInaktif" method="post">

        <?php if (session()->getFlashdata('success')) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>

        <div class="mb-3">
            <label for="klasifikasi" class="form-label">Klasifikasi</label>
            <select name="klasifikasi" class="form-select <?= session()->getFlashdata('klasifikasi') ? 'is-invalid' : '' ?>" id="klasifikasi" aria-label="Default select example">
                <option value="ID Klasifikasi" <?= !old('klasifikasi') ? 'selected' : '' ?>>Pilih Klasifikasi</option>
                <?php foreach ($dataKlasifikasi as $klasifikasi) { ?>
                    <option <?= old('klasifikasi') === $klasifikasi['id_klasifikasi'] ? 'selected' : '' ?> value="<?= $klasifikasi['id_klasifikasi'] ?>">
                        <?= $klasifikasi['kode'] ?> = <?= $klasifikasi['nama_klasifikasi'] ?>
                    </option>
                <?php } ?>
            </select>

            <div id="validationServer03Feedback" class="invalid-feedback">
                <?= session()->getFlashdata('klasifikasi') ?>
            </div>
        </div>

        <div class="mb-3">
            <label for="retensi" class="form-label">Retensi</label>
            <select name="retensi" class="form-select <?= session()->getFlashdata('retensi') ? 'is-invalid' : '' ?>" id="retensi" aria-label="Default select example">
                <option <?= !old('retensi') ? 'selected' : '' ?> value="ID Retensi" selected>Pilih Retensi</option>
                <?php foreach ($dataRetensi as $retensi) { ?>
                    <option <?= old('retensi') === $retensi['id_retensi'] ? 'selected' : '' ?> value="<?= $retensi['id_retensi'] ?>">
                        <?= $retensi['judul'] ?>
                    </option>
                <?php } ?>
            </select>
            <div id="validationServer03Feedback" class="invalid-feedback">
                <?= session()->getFlashdata('retensi') ?>
            </div>
        </div>

        <div class="mb-3">
            <label for="isi" class="form-label">Isi</label>
            <input type="text" class="form-control <?= session()->getFlashdata('isi') ? 'is-invalid' : '' ?>" id="isi" placeholder="Masukkan Isi" name="isi" value="<?= old('isi') ?>">

            <div id="validationServer03Feedback" class="invalid-feedback">
                <?= session()->getFlashdata('isi') ?>
            </div>
        </div>

        <div class="mb-3">
            <label for="tanggalSurat" class="form-label">Tanggal Masuk Dokumen</label>
            <input type="date" class="form-control tanggal-masuk <?= session()->getFlashdata('tanggalSurat') ? 'is-invalid' : '' ?>" id="tanggalSurat" name="tanggalSurat" value="<?= old('tanggalSurat') ?>">

            <div id="validationServer03Feedback" class="invalid-feedback">
               <?= session()->getFlashdata('tanggalSurat') ?>
            </div>
        </div>

        <div class="mb-3">
            <label for="tanggalBerakhirSurat" class="form-label">Tanggal Berakhir Dokumen</label>
            <input type="date" class="form-control tanggal-akhir <?= session()->getFlashdata('tanggalBerakhirSurat') ? 'is-invalid' : '' ?>" id="tanggalBerakhirSurat" name="tanggalBerakhirSurat" value="<?= old('tanggalBerakhirSurat') ?>">

            <div id="validationServer03Feedback" class="invalid-feedback">
                <?= session()->getFlashdata('tanggalBerakhirSurat') ?>
            </div>
        </div>

        <div class="mb-3">
            <label for="perkembangan" class="form-label">Perkembangan</label>
            <select name="perkembangan" class="form-select <?= session()->getFlashdata('perkembangan') ? 'is-invalid' : '' ?>" id="perkembangan" aria-label="Default select example">
                <option value="ID Perkembangan" <?= !old('perkembangan') ? 'selected' : '' ?> selected>Pilih Perkembangan</option>
                <?php foreach ($dataPerkembangan as $perkembangan) { ?>
                    <option <?= old('perkembangan') === $perkembangan['id_perkembangan'] ? 'selected' : '' ?> value="<?= $perkembangan['id_perkembangan'] ?>">
                        <?= $perkembangan['nama_perkembangan'] ?>
                    </option>
                <?php } ?>
            </select>

            <div id="validationServer03Feedback" class="invalid-feedback">
                <?= session()->getFlashdata('perkembangan') ?>
            </div>
        </div>

        <div class="row">
            <label for="jumlah" class="form-label">Jumlah</label>
            <div class="mb-3 col-6">
                <input type="text" class="form-control <?= session()->getFlashdata('jumlah') ? 'is-invalid' : '' ?>" id="jumlah" name="jumlah" value="<?= old('jumlah') ?>">
                <div id="validationServer03Feedback" class="invalid-feedback">
                    <?= session()->getFlashdata('jumlah') ?>
                </div>
            </div>

            <div class="mb-3 col-6">
                <div>
                    <select name="satuan" class="form-select <?= session()->getFlashdata('satuan') ? 'is-invalid' : '' ?>" aria-label="Default select example">
                        <option value="ID Satuan" <?= !old('satuan') ? 'selected' : '' ?>>Pilih Satuan</option>
                        <?php foreach ($dataSatuan as $satuan) { ?>
                            <option <?= old('satuan') === $satuan['id_satuan'] ? 'selected' : '' ?> value="<?= $satuan['id_satuan'] ?>">
                                <?= $satuan['nama_satuan'] ?>
                            </option>
                        <?php } ?>
                    </select>

                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= session()->getFlashdata('satuan') ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="keteranganArsip" class="form-label">Keterangan Arsip</label>
            <input type="text" class="form-control <?= session()->getFlashdata('keteranganArsip') ? 'is-invalid' : '' ?>" id="keteranganArsip" placeholder="Masukkan Keterangan" name="keteranganArsip" value="<?= old('keteranganArsip') ?>">

            <div id="validationServer03Feedback" class="invalid-feedback">
                <?= session()->getFlashdata('keteranganArsip') ?>
            </div>
        </div>

        <div class="mb-3">
            <label for="noFolder" class="form-label">No Definitif Folder dan Books</label>
            <input type="text" class="form-control <?= session()->getFlashdata('noFolder') ? 'is-invalid' : '' ?>" id="noFolder" placeholder="Masukkan No Folder" name="noFolder" value="<?= old('noFolder') ?>">
            <div id="validationServer03Feedback" class="invalid-feedback">
                <?= session()->getFlashdata('noFolder') ?>
            </div>
        </div>

        <div class="mb-3">
            <label for="lokasiSimpan" class="form-label">Lokasi Simpan</label>
            <input type="text" class="form-control <?= session()->getFlashdata('lokasiSimpan') ? 'is-invalid' : '' ?>" id="lokasiSimpan" placeholder="Masukkan Lokasi Simpan" name="lokasiSimpan" value="<?= old('lokasiSimpan') ?>">
            <div id="validationServer03Feedback" class="invalid-feedback">
                <?= session()->getFlashdata('lokasiSimpan') ?>
            </div>
        </div>

        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select name="kategori" class="form-select <?= session()->getFlashdata('kategori') ? 'is-invalid' : '' ?>" id="kategori" aria-label="Default select example">
                <option <?= !old('kategori') ? 'selected' : '' ?> value="ID Kategori" selected>Pilih Kategori</option>
                <?php foreach ($dataKategori as $kategori) { ?>
                    <option <?= old('kategori') === $kategori['id_kategori_arsip'] ? 'selected' : '' ?> value="<?= $kategori['id_kategori_arsip'] ?>">
                        <?= $kategori['kategori'] ?>
                    </option>
                <?php } ?>
            </select>

            <div id="validationServer03Feedback" class="invalid-feedback">
                <?= session()->getFlashdata('kategori') ?>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mb-3">Submit</button>
    </form>
</div>

<?= $this->endSection() ?>