<?php

namespace App\Models;

use CodeIgniter\Model;

class ReturpenjualanModel extends Model
{
    protected $table = 'tb_retur_penjualan';
    protected $primaryKey = 'id';
    //protected $useTimestamps = true;
    protected $allowedFields = ['id', 'tanggal', 'penjualan_faktur', 'operator'];
}
