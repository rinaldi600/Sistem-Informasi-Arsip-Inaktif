<?php

namespace App\Models;

use CodeIgniter\Model;

class InaktifModel extends Model
{
    protected $table      = 'tbl_arsip_inaktif';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'id_arsip_inaktif', 'id_klasifikasi', 'isi', 'tgl_surat', 'tanggal_akhir_surat' ,'id_perkembangan',
        'jumlah', 'id_satuan', 'keterangan_arsip', 'no_folder_books', 'lokasi_simpan',
        'masuk_pengolah', 'id_retensi', 'id_kategori_arsip', 'id_user',
        'created_at', 'updated_at'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

}
