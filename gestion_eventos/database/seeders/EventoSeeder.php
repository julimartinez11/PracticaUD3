<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Evento;

class EventoSeeder extends Seeder
{
    public function run()
    {
        Evento::create([
            'nombre'        => 'Conferencia Tech 2025',
            'descripcion'   => 'Evento de tecnología e innovación, donde se presentan las últimas tendencias.',
            'fecha_inicio'  => '2025-03-01',
        ]);

        Evento::create([
            'nombre'        => 'Feria de Empleo 2025',
            'descripcion'   => 'Feria para conectar a empresas y profesionales en búsqueda de nuevas oportunidades laborales.',
            'fecha_inicio'  => '2025-04-10',
        ]);
    }
}
