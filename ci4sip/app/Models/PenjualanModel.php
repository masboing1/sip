<?php

namespace App\Models;

use CodeIgniter\Model;

class PenjualanModel extends Model
{
    protected $table = 'tb_penjualan';
    protected $primaryKey = 'faktur';
    //protected $useTimestamps = true;
    protected $allowedFields = ['faktur', 'instansi_id', 'tanggal', 'pelanggan_name', 'total', 'bayar', 'operator'];

    public function getdata($id = false)
    {
        if ($id == false) {
            $instansi_id = session()->get('sip_instansi_id');
            return $this->where(['instansi_id' => $instansi_id])->get();
        }
        return $this->where(['faktur' => $id])->first();
    }
}
