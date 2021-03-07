<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patente extends Model
{  
    const MODELO_VIEJO = '1';
    const MODELO_NUEVO = '2';

    protected $fillable = ["numero", "modelo"];
    
    public $timestamps = false;

    public function setNumeroAttribute($value)
    {
        $this->attributes['numero']= strtoupper($value);
    }
    public function setModeloAttribute($value)
    {
        if ($value == Patente::MODELO_VIEJO) {
            $this->attributes['modelo'] = "ARGENTINA";
        }else if($value ==  Patente::MODELO_NUEVO){
            $this->attributes['modelo'] = "MERCOSUR";
        }else{
            $this->attributes['modelo'] = "N/C";
        }
    }
    //Relaciones
    public function movimientoPatentes()
    {
        return $this->hasMany(MovimientoPatente::class);
    }
}
