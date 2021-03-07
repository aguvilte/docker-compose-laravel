<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Denuncia extends Model
{
    protected $fillable = ["nombre","apellido","dni","telefono"];


    public function robo()
    {
        return $this->hasOne('App\Models\Robo');
    }
    public function direccion()
    {
        return $this->hasOne('App\Models\Direccion');
    }

}
