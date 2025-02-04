<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{
    protected $fillable = ['tipo', 'nombre', 'descripcion'];

    public function eventos()
    {
        return $this->belongsToMany(Evento::class, 'evento_recursos', 'recurso_id', 'evento_id')
                    ->withTimestamps();
    }
}

