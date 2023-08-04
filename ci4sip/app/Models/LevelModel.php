<?php

namespace App\Models;

use CodeIgniter\Model;

class LevelModel extends Model
{
    protected $table = 'tm_level';
    protected $primaryKey = 'level';
    //protected $useTimestamps = true;
    protected $allowedFields = ['level'];

    public function getdata($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['level' => $id])->first();
    }
}
