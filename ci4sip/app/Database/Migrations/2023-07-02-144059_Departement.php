<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Departement extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id int(11) auto_increment',
            'name varchar(255) unique',
            'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
            'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('departement');
    }

    public function down()
    {
        $this->forge->dropTable('departement');
    }
}
