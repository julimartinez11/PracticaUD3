<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Actividad;
use App\Models\Participante;
use Illuminate\Support\Str;

class InscripcionSeeder extends Seeder
{
    public function run()
    {
        $actividades = Actividad::all();
        $participantes = Participante::all();

        // Para cada actividad, asignamos 2 participantes
        foreach ($actividades as $actividad) {
            $asistentes = $participantes->take(2);

            foreach ($asistentes as $participante) {
                $actividad->participantes()->attach($participante->id, [
                    'ticket'            => 'TICKET-' . strtoupper(Str::random(6)),
                ]);
            }
        }
    }
}
