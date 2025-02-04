<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Recurso;

class RecursoSeeder extends Seeder
{
    public function run()
    {
        Recurso::create([
            'tipo'        => 'Sala',
            'nombre'      => 'Sala Principal',
            'descripcion' => 'Sala para eventos principales.',
        ]);

        Recurso::create([
            'tipo'        => 'Equipo Técnico',
            'nombre'      => 'Proyector HD',
            'descripcion' => 'Proyector de alta definición para presentaciones.',
        ]);
    }
}
