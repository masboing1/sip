<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'tb_barang';
    protected $primaryKey = 'id';
    //protected $useTimestamps = true;
    protected $allowedFields = ['id', 'instansi_id', 'name', 'deskripsi', 'kategori_id', 'satuan_id', 'jumlah', 'hp', 'hj'];

    public function getdata($id = false)
    {
        if ($id == false) {
            $instansi_id = session()->get('sip_instansi_id');
            return $this->select("tb_barang.*,satuan, kategori")->join('tm_kategori', 'tm_kategori.id=kategori_id')->join('tm_satuan', 'tm_satuan.id=satuan_id')->where(['instansi_id' => $instansi_id])->get();
        }
        return $this->select("tb_barang.*,satuan, kategori")->join('tm_kategori', 'tm_kategori.id=kategori_id')->join('tm_satuan', 'tm_satuan.id=satuan_id')->where(['tb_barang.id' => $id])->first();
    }
}
