<?php

namespace App\Models;

use CodeIgniter\Model;

class PembelianModel extends Model
{
    protected $table = 'tb_pembelian';
    protected $primaryKey = 'faktur';
    //protected $useTimestamps = true;
    protected $allowedFields = ['faktur', 'instansi_id', 'tanggal', 'suplier_name', 'operator'];

    public function getdata($id = false)
    {
        if ($id == false) {
            $instansi_id = session()->get('sip_instansi_id');
            return $this->where(['instansi_id' => $instansi_id])->get();
        }
        return $this->where(['faktur' => $id])->first();
    }
}
