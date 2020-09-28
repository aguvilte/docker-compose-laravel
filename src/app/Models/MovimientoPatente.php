<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovimientoPatente extends Model
{
    protected $fillable=['patente_id'];

    protected $with = ['patente'];

    //SCOPES
    public function scopeSearch($query, $nombre){
       
        if ($nombre != '') {
            return $query->join('patentes','movimiento_patentes.patente_id', '=', 'patentes.id')
                        ->where('patentes.numero', 'LIKE', "%".$nombre."%")
                        ->orderBy('movimiento_patentes.created_at', 'desc');    
        }
        return $query->orderBy('movimiento_patentes.created_at', 'desc');
    }

    //Relaciones
    public function patente()
    {
        return $this->belongsTo(Patente::class);
    }

}
