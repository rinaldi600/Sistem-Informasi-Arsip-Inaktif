<?php

namespace App\Models;

use CodeIgniter\Model;

class PerkembanganModel extends Model
{
    protected $table      = 'tbl_perkembangan';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['id_perkembangan', 'nama_perkembangan', 'id_user', 'created_at', 'updated_at'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
