<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Evento;
use App\Models\Actividad;

class ActividadSeeder extends Seeder
{
    public function run()
    {
        $eventos = Evento::all();

        foreach ($eventos as $evento) {
            
            Actividad::create([
                'evento_id'   => $evento->id,
                'nombre'      => $evento->nombre . ' - Sesión 1',
                'descripcion' => 'Primera sesión del evento.',
            ]);

            Actividad::create([
                'evento_id'   => $evento->id,
                'nombre'      => $evento->nombre . ' - Sesión 2',
                'descripcion' => 'Segunda sesión del evento.',
            ]);

            Actividad::create([
                'evento_id'   => $evento->id,
                'nombre'      => $evento->nombre . ' - Taller Práctico',
                'descripcion' => 'Taller práctico relacionado con el evento.',
            ]);
        }
    }
}
