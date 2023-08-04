<?php

namespace App\Models;

use CodeIgniter\Model;

class InstansiModel extends Model
{
    protected $table = 'tm_instansi';
    protected $primaryKey = 'id';
    //protected $useTimestamps = true;
    protected $allowedFields = ['id', 'name', 'address', 'phone'];

    public function getdata($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
