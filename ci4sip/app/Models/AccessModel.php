<?php

namespace App\Models;

use CodeIgniter\Model;

class AccessModel extends Model
{
    protected $table = 'tm_menu';
    protected $primaryKey = 'id';
    //protected $useTimestamps = true;
    protected $allowedFields = ['id', 'breadcrumb', 'href', 'icon', 'menu', 'group_menu'];
}
