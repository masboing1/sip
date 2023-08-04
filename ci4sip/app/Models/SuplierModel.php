<?php

namespace App\Models;

use CodeIgniter\Model;

class SuplierModel extends Model
{
    protected $table = 'tb_suplier';
    protected $primaryKey = 'id';
    //protected $useTimestamps = true;
    protected $allowedFields = ['id', 'instansi_id', 'name', 'address', 'phone'];

    public function getdata($id = false)
    {
        if ($id == false) {
            $instansi_id = session()->get('sip_instansi_id');
            return $this->where(['instansi_id' => $instansi_id])->get();
        }
        return $this->where(['id' => $id])->first();
    }
}
