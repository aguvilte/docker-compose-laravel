<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $fillable = ["denuncia_id","barrio", "calle", "numero"];

    public $table = "direcciones";
    public $timestamps = false;
    

    public function denuncia()
    {
        return $this->belongsTo('App\Models\Denuncia');
    }

}
