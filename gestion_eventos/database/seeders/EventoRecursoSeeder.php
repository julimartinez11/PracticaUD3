<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Evento;
use App\Models\Recurso;

class EventoRecursoSeeder extends Seeder
{
    public function run()
    {
        $eventos = Evento::all();
        $recursos = Recurso::all();

        foreach ($eventos as $evento) {
            $evento->recursos()->attach($recursos->pluck('id')->toArray());
        }
    }
}
