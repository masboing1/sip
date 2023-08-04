<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'registration_date' => '2023-07-02',
            'nik'    => '2201279',
            'name'    => 'Ahmad Ghozali',
            'plant_id'    => '1',
            'division_id'    => '1',
            'departement_id'    => '1',
            'soft_skill'    => 'IT Support',
            'hard_skill'    => 'Teknisi Jaringan',
            'status'    => '1',
        ];
        // Using Query Builder
        $this->db->table('employee')->insert($data);
    }
}