<?php

namespace App\Models;

use CodeIgniter\Model;

class SecurityModel extends Model
{
    protected $table = 'tb_access';

    public function get($menu_id)
    {
        $level = session()->get('sip_level');
        $data = db_connect()->query("Select * from tb_access where level = '$level' and menu_id = '$menu_id'");
        
        if ($data->getNumRows() == 0) {
            session()->setFlashdata('error', 'Akses ditolak!');
            header("Location:".base_url());
            exit;
        }
       // return $data;
    }
}
