<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = ['nombre', 'descripcion', 'fecha_inicio'];

    public function actividades()
    {
        return $this->hasMany(Actividad::class);
    }

    public function detalle()
    {
        return $this->hasOne(DetalleEvento::class, 'evento_id');
    }

    public function recursos()
    {
        return $this->belongsToMany(Recurso::class, 'evento_recursos', 'evento_id', 'recurso_id');
    }
}

