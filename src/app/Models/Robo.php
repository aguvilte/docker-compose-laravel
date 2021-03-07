<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Robo extends Model
{
    const ESTADO_ACTIVO = 'En Búsqueda';
    const ESTADO_INACTIVO = 'Recuperado';

    protected $fillable = ["numero_patente", "denuncia_id", "fecha_hora", "decripcion","estado"];


    public function denuncia()
    {
       return $this->belongsTo('App\Models\Denuncia');
    }
    
    
}
