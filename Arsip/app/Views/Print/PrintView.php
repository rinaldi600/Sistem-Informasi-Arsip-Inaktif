<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Excel</title>
</head>
<body>

    <?php
    header("Content-type: application/vnd-ms-excel");

    // membuat nama file ekspor "export-to-excel.xls"
    header("Content-Disposition: attachment; filename=Data-Arsip-Inaktif-Tahun-" . $year . " ( ".  $dateTime ." ).xls");
    ?>

    <h1 style="text-align: center">KESIMPULAN SETELAH MASA RETENSI ARSIP <?= $year ?></h1>

    <p>ORGANISASI : BADAN PERENCANAAN PEBANGUNAN, PENELITIAN DAN PENGEMBANGAN</p>
    <P>UNIT PENGOLAH : BAPPEDA</P>

    <table border="1" class="table">
        <thead>
        <tr>
            <th scope="col"><?= strtoupper('No') ?></th>
            <th scope="col"><?= strtoupper('Klasifikasi') ?></th>
            <th scope="col"><?= strtoupper('Jenis Arsip') ?></th>
            <th scope="col"><?= strtoupper('Tanggal Dokumen') ?></th>
            <th scope="col">
                <?= strtoupper('Tingkat') ?> <br>
                <?= strtoupper('Perkembangan') ?>
            </th>
            <th scope="col"><?= strtoupper('Jumlah') ?></th>
            <th scope="col"><?= strtoupper('Ket') ?></th>
            <th scope="col">
                <?= strtoupper('Nomor Definitif') ?> <br>
                <?= strtoupper('Folder dan Books') ?>
            </th>
            <th scope="col"><?= strtoupper('Unit pengolah') ?></th>
            <th>
                MASUK <br>
                RECORD <br>
                CENTER
            </th>
            <th scope="col">
                <?= strtoupper('Jangka Simpan') ?> <br>
                <?= strtoupper('dan Nasib Akhir') ?>
            </th>
            <th scope="col"><?= strtoupper('Jenis Retensi Arsip') ?></th>
            <th scope="col">
                <?= strtoupper('kategori') ?> <br>
                <?= strtoupper('Arsip') ?>
            </th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <?php for ($x = 1; $x <= 13 ; $x++) { ?>
                    <td style="font-weight: bold; text-align: center">[<?= (int) $x ?>]</td>
                <?php } ?>
            </tr>
        <?php if (empty($dataInaktif)) { ?>
            <td class="text-center" colspan="15">Tidak ada aksi arsip di tahun ini</td>
        <?php } else { ?>
            <?php $number = 1; ?>
            <?php foreach ($dataInaktif as $inaktif) { ?>
                <tr>
                    <td style="text-align: center"><?= $number++ ?></td>
                    <td style="text-align: center"><?= $inaktif['kode'] ?></td>
                    <td style="text-align: center"><?= $inaktif['isi'] ?></td>
                    <td style="text-align: center" class="text-center">
                        <?php setlocale(LC_ALL, 'IND');
                            $tanggalMasukSurat =  strftime('%e %B %Y', strtotime($inaktif['tgl_surat']));
                            $tanggalAkhirSurat = strftime('%e %B %Y', strtotime($inaktif['tanggal_akhir_surat']));
                        ?>
                        <?= $inaktif['tgl_surat'] == $inaktif['tanggal_akhir_surat'] ?
                            $tanggalMasukSurat
                            :
                            $tanggalMasukSurat . '<span class="fw-bold">&nbsp; / &nbsp;</span> <br>' . $tanggalAkhirSurat ?>
                    </td>
                    <td style="text-align: center"><?= $inaktif['nama_perkembangan'] ?></td>
                    <td style="text-align: center"><?= $inaktif['jumlah'] . ' ' . $inaktif['nama_satuan'] ?></td>
                    <td style="text-align: center"><?= $inaktif['keterangan_arsip'] ?></td>
                    <td style="text-align: center"><?= $inaktif['no_folder_books'] ?></td>
                    <td style="text-align: center"><?= $inaktif['lokasi_simpan'] ?></td>
                    <td style="text-align: center">
                        <?php
                        setlocale(LC_ALL, 'IND');
                        $masukPengolah = strftime('%e %B %Y', strtotime($inaktif['masuk_pengolah']));
                        ?>
                        <?= $masukPengolah ?>
                    </td>
                    <td style="text-align: center"><?= $inaktif['tahun_aksi'] . ' Tahun Setelah Pensiun <br>'
                        . '<span class="fw-bold">'. $inaktif['keterangan_aksi'] .'</span>' ?></td>
                    <td style="text-align: center">
                        <?php
                        setlocale(LC_ALL, 'IND');
                        $tahunKapan = strftime('%e %B %Y', strtotime(date('Y-m-d', strtotime('+' . $inaktif['tahun_aksi'] . 'years', strtotime($inaktif['masuk_pengolah'])))))
                        ?>
                        <?= $inaktif['judul'] . ' <br> <span class="text-center fw-bold">' . $inaktif['tahun_aksi'] .' Tahun Sampai <br>'
                        . $tahunKapan . '</span>' ?></td>
                    <td style="text-align: center"><?= $inaktif['kategori'] ?></td>
                </tr>
            <?php } ?>
        <?php } ?>
        </tbody>
    </table>
</body>
</html>
