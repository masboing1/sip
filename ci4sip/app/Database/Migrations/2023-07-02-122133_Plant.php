<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Plant extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id int(11) auto_increment',
            'name varchar(255) unique',
            'site varchar(255)',
            'address varchar(20)',
            'postalcode varchar(10)',
            'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
            'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('plant');
    }

    public function down()
    {
        $this->forge->dropTable('plant');
    }
}
