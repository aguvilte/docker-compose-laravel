<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Robo extends Model
{
    protected $fillable = ["numero_patente", "persona_robada_id", "fecha_hora"];

    public function personaRobada()
    {
        return $this->belongsTo(PersonaRobada::class);
    }
}
