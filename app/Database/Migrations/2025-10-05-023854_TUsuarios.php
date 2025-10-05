<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TUsuarios extends Migration
{
    public function up()
    {
        // 1. Definir los campos de la tabla
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'nombres' => [
                'type' => 'VARCHAR',
                'constraint' => '80',
                'null' => false
            ],
            'nomusuario' => [
                'type' => 'VARCHAR',
                'constraint' => '40',
                'null' => false
            ],
            'claveacceso' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false
            ],
            'img_avatar' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
                'default' => null
            ],
            'create_at' => [
                'type' => 'DATETIME',
                'null' => false
            ],
            'update_at' => [
                'type' => 'DATETIME',
                'null' => true
            ]
        ]);

        // 2. Definir la clave primaria
        $this->forge->addKey('id', true);

        // 3. Restricción UNIQUE para nomusuario
        $this->forge->addKey('nomusuario', false, true, 'uk_nomusuario');

        // 4. Creación de la tabla
        $this->forge->createTable('usuarios');
    }

    public function down()
    {
        // 5. Rollback (deshacer los cambios)
        $this->forge->dropTable('usuarios');
    }
}