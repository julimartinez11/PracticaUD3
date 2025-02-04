<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Evento;
use App\Models\DetalleEvento;

class DetalleEventoSeeder extends Seeder
{
    public function run()
    {
        $eventos = Evento::all();

        foreach ($eventos as $evento) {
            // Solo crea el detalle si no existe ya uno para este evento
            DetalleEvento::firstOrCreate(
                ['evento_id' => $evento->id],  // Condición para buscar un detalle existente
                [
                    'otros_detalles'    => 'Otros detalles relevantes del evento.',
                ]
            );
        }
    }
}
