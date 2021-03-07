<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Models\Robo;
use DB;

class NotificacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notificaciones = Auth::user()->notifications()->get();
        return view('notificaciones.index', compact('notificaciones'));
    }

   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        //buscamos la notificacion del usuario
        $notificacion = Auth::user()->notifications->where('id', $id)->first();
        //determinamos si esta leida 
        if ($notificacion->read_at === null) {
            //marcamos como leida
            $notificacion->markAsRead();
        }

        return view('notificaciones.show', compact('notificacion'));
    }

    public function detalles($id)
    {
        Carbon::setlocale(config('app.locale'));
        $notificacion = Auth::user()->notifications->where('id', $id)->first();
    
        $robo = Robo::where('numero_patente',$notificacion->data['numero_patente'])->with('denuncia')->first();
        
        $estado = Robo::ESTADO_ACTIVO;
        
        return view('notificaciones.detalles', compact('notificacion', 'robo', 'estado'));
    }

}
