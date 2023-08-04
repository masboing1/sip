<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'registration_date' => '2023-07-02',
            'employee_id'    => '1',
            'nik'    => '2201279',
            'password'    => md5('4lghozali'),
            'access_id'    => '1'
        ];
        // Using Query Builder
        $this->db->table('users')->insert($data);
    }
}
