<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisOperasionalModel extends Model
{
    protected $table = 'tm_jenis_operasional';
    protected $primaryKey = 'id';
    //protected $useTimestamps = true;
    protected $allowedFields = ['id','uraian','jenis'];

    public function getdata($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}