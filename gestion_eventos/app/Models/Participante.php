<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    protected $fillable = ['nombre', 'apellido', 'email'];

    public function actividades()
    {
        return $this->belongsToMany(Actividad::class, 'inscripciones', 'participante_id', 'actividad_id')
                    ->withPivot('ticket')
                    ->withTimestamps();
    }
}
