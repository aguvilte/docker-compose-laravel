<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp;
use App\Patentes;

class MenuController extends Controller
{
    
    //Verificar que el usuario está logueado
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('menu.index');
    }

    public function subir(Request $request){

        $file = $request->file('archivo');
        $ruta = public_path().'/upload';
        // $fileName = uniqid().$file->getClientOriginalName();
        // $ruta_imagen = 'upload/'.$fileName;

        //POST a la API de platerecognizer
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'https://api.platerecognizer.com/v1/plate-reader/', [
                'headers' => [
                    'authorization' => 'Token d9d0ee29791f3804b51790b672d96679d2ea3748',
                ],
                'form_params' => [
                    'upload' => base64_encode(file_get_contents($request->file('archivo')->path()))
                ],
                
            ]);

        $datos_vehiculo = json_decode($response->getBody()->getContents());

        // $file->move($ruta, $fileName);
        
        //La bandera es para que sólo me guarde los datos que encontró de la patente con más precisión.
        $bandera = 0;

        foreach($datos_vehiculo->results as $datos){

            $patente = new Patentes;


            //DIVIDIR CARACTERES
            $plate = strtoupper($datos->plate);
            $nro_caracteres = strlen($plate);

            if($nro_caracteres == 6){
                $plate_mitad1 = substr($plate, 0,3);
                $plate_mitad2 = substr($plate, 3,3);
                
                $plate_completa = $plate_mitad1.' '.$plate_mitad2;
            }
            elseif($nro_caracteres == 7){
                $plate_mitad1 = substr($plate, 0,2);
                $plate_mitad2 = substr($plate, 2,3);
                $plate_mitad3 = substr($plate, 5,2);

                $plate_completa = $plate_mitad1.' '.$plate_mitad2.' '.$plate_mitad3;
            }

            //REGIÓN
            $region = $datos->region->code;

            if($region == 'ar')
                $region = 'Argentina';
            else
                $region = 'Otra';

            //TIPO DE VEHÍCULO
                $tipo_vehiculo = $datos->vehicle->type;

            if($tipo_vehiculo == 'Car')
                $tipo_vehiculo = 'Automóvil';
            elseif($tipo_vehiculo == 'Motorcycle')
                $tipo_vehiculo = 'Motocicleta';
            else
                $tipo_vehiculo = 'Otro';

            //PORCENTAJE DE PRECISIÓN
            $precision = $datos->score * 100;
            
            $patente->numero_patente = $plate_completa;
            $patente->region = $region;
            $patente->tipo_vehiculo = $tipo_vehiculo;
            $patente->precision = $precision;

            //GUARDAMOS EL ARCHIVO EN LA CARPETA UPLOADS
            $fileName = date("d-m-Y").'-'.uniqid().$file->getClientOriginalName();
            $file->move($ruta, $fileName);

            //GUARDAMOS LA RUTA DEL ARCHIVO EN LA BD
            $patente->ruta_imagen = $fileName;

            if($bandera == 0)
                $patente->save();            

            $bandera = 1;
        }

        return redirect()->action('MenuController@show', ['id' => $patente->id]);
        
    }
    
    
    public function showAll(){
        $patentes = Patentes::get();
        
        return view('menu.patentes', [
            'patentes' => $patentes,
        ]);
    }


    public function show($id){
       $datos_patente = Patentes::findOrFail($id);

       return view('menu.patente', [
           'datos_patente' => $datos_patente,
       ]);
    }

    public function api(){

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'http://localhost:8081/recognize/license_plate');

        $datos_vehiculo = json_decode($response->getBody()->getContents());
        
        // var_dump($datos_vehiculo);
        // dd($datos_vehiculo);
        // die();

        $patente = new Patentes;

        $plate = $datos_vehiculo->license_plate;
        $categoria = $datos_vehiculo->category;
        $modelo = $datos_vehiculo->decisive_model;

        $precision_sherlock = $datos_vehiculo->executed_models->sherlock;
        $precision_watson = $datos_vehiculo->executed_models->watson;

        if($precision_sherlock > $precision_watson)
            $precision = $precision_sherlock;
        elseif($precision_sherlock < $precision_watson)
            $precision = $precision_watson;
        elseif($precision_sherlock == $precision_watson)
            $precision = $precision_sherlock;
        else
            $precision = "No se ha podido verificar la precisión";

        $patente->numero_patente = $plate;
        $patente->categoria = $categoria;
        $patente->modelo = $modelo;
        $patente->precision = $precision;

        $patente->save();

        if($patente->save())
            echo "Se han guardado los datos";

    }
}
