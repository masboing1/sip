<?php

namespace App\Models;

use CodeIgniter\Model;

class OperasionalModel extends Model
{
    protected $table = 'tb_operasional';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'tanggal', 'jenis_operasional_id', 'detail', 'biaya'];

    public function getdata($bulan)
    {
        $instansi_id = session()->get('sip_instansi_id');
        return $this->select("*")->where(["LEFT(id,4)" => $instansi_id, "DATE_FORMAT( tanggal, '%Y-%m' )" => $bulan])->get();
    }
    public function getdetail($id)
    {
        return $this->where(["id" => $id])->first();
    }
}
