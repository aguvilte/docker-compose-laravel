<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonaRobada;
use App\Models\Robo;
use DB;

class PersonasRobadasController extends Controller
{
    public function index(Request $request)
    {
        $personas = PersonaRobada::Search($request->buscarnombre)
        ->paginate(3);
    
        return view('personas.index',['personas' => $personas]);
    }
   
    public function create()
    {
        return view('personas.create');
    }

    public function save(Request $request)
    {
        $request->validate([
            "nombre" => "required|string",
            "apellido" => "required|string",
            "direccion" => "required|string",
            "telefono" => "required|string",
            "fecha_hora" => "required|date",
            "patente" => "required"
        ]);

        DB::beginTransaction();
        try {
            $persona= new PersonaRobada();
            $persona->nombre = $request->nombre;
            $persona->apellido = $request->apellido;
            $persona->direccion = $request->direccion;
            $persona->telefono = $request->telefono;
            $persona->save();
            
            $robo = new Robo();
            $robo->numero_patente = $request->patente;
            $robo->fecha_hora = $request->fecha_hora;
            //guardamos la relación
            $persona->robos()->save($robo);
            
            DB::commit();
            
            return redirect()->action('PersonasRobadasController@index');
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 500);
        }       
    }
  
    public function edit($id)
    {
        $persona = PersonaRobada::findOrFail($id);
        $robo = Robo::where('persona_robada_id', $persona->id)->first();
        
        return view('personas.edit',[
            'persona' => $persona,
            'robo' => $robo
            ]);
    }

    public function update(Request $request, $id)
    {
        $persona = PersonaRobada::findOrFail($id);
        $persona->update($request->all());

        $robo = Robo::where('id_persona_robada', $persona->id)->first();
        $robo->id_patente = $request->id_patente;
        $robo->fecha_hora = $request->fecha_hora;
        $robo->save();

        return redirect()->action('PersonasRobadasController@index');

    }

    public function destroy($id)
    {
        //
    }
}
