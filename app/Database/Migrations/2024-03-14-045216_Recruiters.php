<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Recruiters extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'auto_increment' => true
            ],
            'username' => [
                'type'  => 'VARCHAR',
                'constraint' => '100',
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('recruiters');
    }

    public function down()
    {
        $this->forge->dropTable('recruiters');
    }
}
