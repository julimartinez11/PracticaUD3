<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            EventoSeeder::class,
            ActividadSeeder::class,
            ParticipanteSeeder::class,
            RecursoSeeder::class,
            DetalleEventoSeeder::class,
            InscripcionSeeder::class,
            EventoRecursoSeeder::class,
        ]);
    }
}
