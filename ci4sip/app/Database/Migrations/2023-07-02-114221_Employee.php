<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Employee extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id int(11) auto_increment',
            'registration_date date',
            'nik varchar(20) unique',
            'name varchar(255)',
            'plant_id int(11)',
            'division_id int(11)',
            'departement_id int(11)',
            'soft_skill varchar(255)',
            'hard_skill varchar(255)',
            'status boolean',
            'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
            'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('employee');
    }

    public function down()
    {
        $this->forge->dropTable('employee');
    }
}
