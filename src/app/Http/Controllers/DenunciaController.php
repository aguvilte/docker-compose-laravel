<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Denuncia;
use App\Models\Robo;
use App\Models\Direccion;
use DB;
use App\Http\Requests\DenunciaCreateRequest;
use App\Http\Requests\DenunciaUpdateRequest;

class DenunciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $denuncias = Denuncia::with('robo')->get();
        $estado= Robo::ESTADO_ACTIVO;
        return view('denuncias.index', compact('denuncias', 'estado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('denuncias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DenunciaCreateRequest $request)
    {
        $patente = $this->setPatente($request->patente);

        DB::beginTransaction();
        try {
            $denuncia= new Denuncia();
            $denuncia->nombre = $request->nombre;
            $denuncia->apellido = $request->apellido;
            $denuncia->dni = $request->dni;
            $denuncia->telefono = $request->telefono;
            $denuncia->save();
            
            $direccion = new Direccion();
            $direccion->barrio = $request->barrio;
            $direccion->calle = $request->calle;
            $direccion->numero = $request->numero;
          
            $denuncia->direccion()->save($direccion);

            $robo = new Robo();
            $robo->numero_patente = $patente;
            $robo->fecha_hora = $request->fecha_hora;
            $robo->descripcion = $request->descripcion;
            $robo->estado = Robo::ESTADO_ACTIVO;
            //guardamos la relación
            $denuncia->robo()->save($robo);
            
            DB::commit();
            
            return redirect()->route('denuncias.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 500);
        }       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $denuncia = Denuncia::findOrFail($id);
        $estado = Robo::ESTADO_ACTIVO;
        return view('denuncias.show', compact('denuncia', 'estado'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $denuncia = Denuncia::with('robo')->findOrFail($id);
        
        return view('denuncias.edit', compact('denuncia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DenunciaUpdateRequest $request, $id)
    {
        $denuncia = Denuncia::findOrFail($id);
        try {
            DB::beginTransaction();
            $direccion = $denuncia->direccion()->update([
                'barrio' => $request->barrio,
                'calle' => $request->calle,
                'numero' => $request->numero
            ]);
            $plate = $this->setPatente($request->patente);
            
            $robo = $denuncia->robo()->update([
                'numero_patente' => $plate,
                'fecha_hora' => $request->fecha_hora,
                'descripcion' => $request->descripcion
            ]);
            $denuncia->update([
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'dni' => $request->dni,
                'telefono' => $request->telefono
            ]);
           
            DB::commit();
            
            return redirect()->route('denuncias.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 500);
        }
       
    }


    public function setPatente($numero)
    {
        //sacamos cualquier espacio 
        $numPatente = str_replace(' ', '', $numero);

        if (strlen($numPatente) == 6) {
            $numeroPatente = substr($numPatente,0,3).' '.substr($numPatente,3,7);
        }elseif (strlen($numPatente) == 7) {
            $numeroPatente = substr($numPatente,0,2).' '.substr($numPatente,2,3).' '.substr($numPatente,5,6);
        }
        $newPatente = strtoupper($numeroPatente);
        
        return $newPatente;
    }

    public function cambioEstado($id)
    {
        $denuncia = Denuncia::findOrFail($id);
        try {
            if ($denuncia->robo->estado === Robo::ESTADO_ACTIVO) {
                $denuncia->robo()->update([
                    'estado' => Robo::ESTADO_INACTIVO
                ]);
            }else {
                $denuncia->robo()->update([
                    'estado' => Robo::ESTADO_ACTIVO
                ]);
            }

            return redirect()->route('denuncias.index');
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
        
       
    }
}
