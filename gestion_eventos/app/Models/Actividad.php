<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table = 'actividades';
    protected $fillable = ['evento_id', 'nombre', 'descripcion'];

    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }

    public function participantes()
    {
        return $this->belongsToMany(Participante::class, 'inscripciones', 'actividad_id', 'participante_id')
                    ->withPivot('ticket')
                    ->withTimestamps();
    }
}
