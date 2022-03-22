<?= $this->extend('DashboardLayout/DashboardView') ?>

<?= $this->section('content') ?>
<div class="inaktif-view">
    <a class="btn btn-primary" href="/inaktif_arsip/tambah_data">Tambah Data</a>
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
        <form action="/inaktif_arsip" method="get">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Masukkan keyword" name="keyword">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
            </div>
        </form>
    </div>

    <div class="table-responsive col-lg-12">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Klasifikasi</th>
                <th scope="col">Jenis Arsip</th>
                <th scope="col">Tanggal Dokumen</th>
                <th scope="col">Tingkat Perkembangan</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Nomor Definitif Folder dan Books</th>
                <th scope="col">Lokasi Simpan</th>
                <th scope="col">Masuk Record Center</th>
                <th scope="col">Jangka Simpan dan Nasib Akhir</th>
                <th scope="col">kategori Arsip</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php if (empty($dataInaktif)) { ?>
                <td class="text-center" colspan="12">Data Kosong</td>
            <?php } else { ?>
                <?php foreach ($dataInaktif as $inaktif) { ?>
                    <tr>
                        <th scope="row"><?= $numberPagination++ ?></th>
                        <td><?= $inaktif['kode'] ?></td>
                        <td><?= $inaktif['isi'] ?></td>
                        <td class="text-center">
                            <?php setlocale(LC_ALL, 'IND');
                                $tanggalMasukSurat =  strftime('%e %B %Y', strtotime($inaktif['tgl_surat']));
                                $tanggalAkhirSurat = strftime('%e %B %Y', strtotime($inaktif['tanggal_akhir_surat']));
                            ?>
                            <?= $inaktif['tgl_surat'] == $inaktif['tanggal_akhir_surat'] ?
                                $tanggalMasukSurat
                                :
                                $tanggalMasukSurat . '<span class="fw-bold">&nbsp; / &nbsp;</span>' . $tanggalAkhirSurat ?>
                        </td>
                        <td><?= $inaktif['nama_perkembangan'] ?></td>
                        <td><?= $inaktif['jumlah'] . ' ' . $inaktif['nama_satuan'] ?></td>
                        <td><?= $inaktif['keterangan_arsip'] ?></td>
                        <td><?= $inaktif['no_folder_books'] ?></td>
                        <td><?= $inaktif['lokasi_simpan'] ?></td>
                        <td>
                            <?php
                                setlocale(LC_ALL, 'IND');
                                $masukPengolah = strftime('%e %B %Y', strtotime($inaktif['masuk_pengolah']));
                            ?>
                            <?= $masukPengolah ?>
                        </td>
<!--                        --><?php
//                            try {
//                                $date1 = new DateTime($inaktif['tgl_surat']);
//                                $date2 = new DateTime($inaktif['masuk_pengolah']);
//                                $diff = $date1->diff($date2);
//                            } catch (Exception $e) {
//                            }
//                        ?>
                        <?php
                        setlocale(LC_ALL, 'IND');
                            $tahunKapan = strftime('%e %B %Y', strtotime(date('Y-m-d', strtotime('+' . $inaktif['tahun_aksi'] . 'years', strtotime($inaktif['masuk_pengolah'])))))
                        ?>
                        <td><?= $inaktif['tahun_aksi'] . ' Tahun Setelah Pensiun '
                            . '<span class="fw-bold">'. $inaktif['keterangan_aksi'] .'</span>'
                            . '<br> ' . '('. $tahunKapan . ')'?>
                        </td>
                        <td><?= $inaktif['kategori'] ?></td>
                        <td class="d-flex flex-wrap gap-2">
                            <a class="btn btn-warning" href="/inaktif_arsip/edit/<?= $inaktif['id_arsip_inaktif'] ?>">Edit</a>
                            <form action="/hapusDataInaktif" method="post">
                                <input type="hidden" value="<?= $inaktif['id_arsip_inaktif'] ?>" name="idInaktif">
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
        <?= $pager->links('tbl_arsip_inaktif', 'front_full') ?>
    </div>
</div>
<?= $this->endSection() ?>

