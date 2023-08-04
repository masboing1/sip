<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'tm_kategori';
    protected $primaryKey = 'id';
    //protected $useTimestamps = true;
    protected $allowedFields = ['id','kategori'];

    public function getdata($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}