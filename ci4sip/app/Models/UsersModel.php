<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'tm_users';
    protected $primaryKey = 'username';
    //protected $useTimestamps = true;
    protected $allowedFields = ['instansi_id', 'username','name', 'password', 'level', 'foto'];

    public function getdata($username = false)
    {
        if ($username == false) {
            return $this->findAll();
        }
        return $this->where(['username' => $username])->first();
    }
}
