<?php

namespace App\Models;

use CodeIgniter\Model;

class RetensiModel extends Model
{
    protected $table      = 'tbl_retensi';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['id_retensi', 'judul', 'tahun_aksi', 'keterangan_aksi', 'id_user', 'created_at', 'updated_at'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}