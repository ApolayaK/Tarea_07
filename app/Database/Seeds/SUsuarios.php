<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SUsuarios extends Seeder
{
    public function run()
    {
        // 1. Registro inicial con avatar null
        $data = [
            [
                'nombres' => 'Usuario Demo',
                'nomusuario' => 'demo',
                'claveacceso' => password_hash('demo123', PASSWORD_DEFAULT),
                'img_avatar' => null,
                'create_at' => date('Y-m-d H:i:s'),
                'update_at' => null
            ]
        ];

        // 2. Insert en la tabla
        $this->db->table('usuarios')->insertBatch($data);
    }
}