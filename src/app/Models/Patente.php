<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patente extends Model
{  
    const MODELO_VIEJO = '1';
    const MODELO_NUEVO = '2';

    protected $fillable = ["numero", "modelo", "region", "precision"];
    
    public function setNumeroAttribute($value)
    {
        $this->attributes['numero']= strtoupper($value);
    }
    public $timestamps = false;

    //Relaciones
    public function movimientoPatentes()
    {
        return $this->hasMany(MovimientoPatente::class);
    }
}
