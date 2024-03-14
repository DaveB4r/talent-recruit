<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Ofertas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'auto_increment' => true
            ],
            'nombre' => [
                'type'  => 'VARCHAR',
                'constraint' => '255',
            ],
            'stack' => [
                'type'  => 'VARCHAR',
                'constraint' => '255',
            ],
            'descripcion' => [
                'type' => 'TEXT',
                'constraint' => ''
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('ofertas');
    }

    public function down()
    {
        $this->forge->dropTable('ofertas');
    }
}
