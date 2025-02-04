<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Participante;

class ParticipanteSeeder extends Seeder
{
    public function run()
    {
        // Creamos algunos participantes de ejemplo
        Participante::create([
            'nombre'   => 'Juan',
            'apellido' => 'Pérez',
            'email'    => 'juan@example.com',
        ]);

        Participante::create([
            'nombre'   => 'María',
            'apellido' => 'García',
            'email'    => 'maria@example.com',
        ]);

        Participante::create([
            'nombre'   => 'Carlos',
            'apellido' => 'López',
            'email'    => 'carlos@example.com',
        ]);
    }
}
