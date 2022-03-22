<?= $this->extend('DashboardLayout/DashboardView') ?>

<?= $this->section('content') ?>

<div class="kesimpulan-view">

    <div class="col-lg-8 mb-3 mt-3">
        <form action="/kesimpulan_arsip" method="get">
            <div class="input-group">
                <input type="text" class="form-control" autocomplete="off" name="keyword" id="datepicker" placeholder="Masukkan Tahun">
                <script>
                    $(document).ready(function(){
                        $("#datepicker").datepicker({
                            format: "yyyy",
                            viewMode: "years",
                            minViewMode: "years",
                            autoclose:true
                        });
                    })
                </script>
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
            </div>
        </form>
    </div>

    <div class="table-responsive col-lg-12">
        <?php if (!empty($dataInaktif)) { ?>
            <div class="input-group">
                <form action="/print_excel" method="post">
                    <input class="<?= session()->getFlashdata('year') ? 'is-invalid' : '' ?>" type="hidden" name="year" value="<?= $_GET['keyword'] ?? date('Y') ?>">
                    <button type="submit" class="btn btn-success">Print</button>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= session()->getFlashdata('year') ?>
                    </div>
                </form>
            </div>
        <?php } ?>
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
                <th scope="col">Jenis Retensi Arsip</th>
                <th scope="col">Keterangan Retensi Arsip</th>
            </tr>
            </thead>
            <tbody>
            <?php if (empty($dataInaktif)) { ?>
                <td class="text-center" colspan="15">Tidak ada aksi arsip di tahun ini</td>
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
//                        try {
//                            $date1 = new DateTime($inaktif['tgl_surat']);
//                            $date2 = new DateTime($inaktif['masuk_pengolah']);
//                            $diff = $date1->diff($date2);
//                        } catch (Exception $e) {
//                        }
//                        ?>
                        <td><?= $inaktif['tahun_aksi'] . ' Tahun Setelah Pensiun ' . '<span class="fw-bold">'. $inaktif['keterangan_aksi'] .'</span>' ?></td>
                        <td><?= $inaktif['kategori'] ?></td>
                        <td>
                            <?php
                                setlocale(LC_ALL, 'IND');
                                $tahunKapan = strftime('%e %B %Y', strtotime(date('Y-m-d', strtotime('+' . $inaktif['tahun_aksi'] . 'years', strtotime($inaktif['masuk_pengolah'])))))
                            ?>
                            <?= $inaktif['judul'] . ' <br> <span class="text-center fw-bold">' . $inaktif['tahun_aksi'] .' Tahun Sampai '
                            . $tahunKapan . '</span>' ?></td>
                        <td><?= $inaktif['keterangan_aksi'] ?></td>
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


