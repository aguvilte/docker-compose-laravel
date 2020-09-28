<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonaRobada extends Model
{
    protected $fillable= ["nombre","apellido","direccion","telefono"];
    
    public function robos()
    {
        return $this->hasMany(Robo::class);
    }
    
    //SCOPES
    public function scopeSearch($query, $nombre){
        return $query->where('nombre', 'LIKE', "%$nombre%")
                    ->orWhere('apellido', 'LIKE', "%$nombre%");
    }
}
