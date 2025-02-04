<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleEvento extends Model
{
    protected $table = 'detalle_evento';
    protected $primaryKey = 'evento_id';
    public $incrementing = false; // ya que usamos evento_id como PK
    protected $fillable = ['evento_id', 'otros_detalles'];

    public function evento()
    {
        return $this->belongsTo(Evento::class, 'evento_id');
    }
}
