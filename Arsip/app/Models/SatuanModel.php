<?php

namespace App\Models;

use CodeIgniter\Model;

class SatuanModel extends Model
{
    protected $table      = 'tbl_satuan';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;


    protected $allowedFields = ['id_satuan', 'nama_satuan', 'id_user', 'created_at', 'updated_at'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}