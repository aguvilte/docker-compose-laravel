<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Models\Patente;
use App\Models\MovimientoPatente;
use App\Events\ConfirmedRobo;
use App\Events\ActividadPatente;
use DB;
use GuzzleHttp;

class PatentesController extends Controller
{
    //Verificar que el usuario está logueado
    public function __construct()
    {
        $this->middleware('auth');
    }

    //MOSTRAR DATOS DE TODAS LAS PATENTES
    public function index(Request $request){
        
        $patentes = MovimientoPatente::Search($request->buscarpatente)->paginate(15);
       
        return view('plates.index', compact('patentes'));
    }

    public function store()
    {
        //aca deberiamos definir como hacer si tomamos la foto desde la carpeta de donde recibimos los datos
        $datosPatente =[
            "numero"=>"lfd453",
            "precision"=> "89.90"
        ];
        //aca se debera validar cuando se reciban los datos

        $nroCaracteres= strlen($datosPatente["numero"]);
        
        if ($nroCaracteres == 6) {
            $numeroPatente = substr($datosPatente["numero"],0,3).' '.substr($datosPatente["numero"],3,7);
            $datosPatente["numero"] = strtoupper($numeroPatente);
            $datosPatente["modelo"] = Patente::MODELO_VIEJO;
        }elseif ($nroCaracteres == 7) {
            $numeroPatente = substr($datosPatente["numero"],0,2).' '.substr($datosPatente["numero"],2,3).' '. substr($datosPatente["numero"],5,2);
            $datosPatente["numero"]= strtoupper($numeroPatente);
            $datosPatente["modelo"] = Patente::MODELO_NUEVO;
        }else{
            $datosPatente["modelo"] = "";
        }
        //INICIAMOS LA TRANSACCION
        DB::beginTransaction();
        try {
             //buscamos si la patente ya existe en caso que no se creara
             $patente = Patente::where("numero", $datosPatente["numero"])->firstOrCreate([
                "numero" => $datosPatente["numero"], 
                "modelo" => $datosPatente["modelo"]
            ]);

            $movimiento = new MovimientoPatente();
            $movimiento->precision = $datosPatente["precision"];
            
            // se asocia la instancia a la patente
            $patente->movimientoPatentes()->save($movimiento);
            
            //confirmamos la transaccion y redireccionamos
            DB::commit();
            event(new ActividadPatente($movimiento));
           // event(new ConfirmedRobo($movimiento));
           //return redirect()->route('indexPatente');   
        } catch (\Throwable $th) {
            DB::rollBack();
            //se deberia llamar al evento de cache
            return response()->json(['error' => $th->getMessage()], 500);        
        } 
       
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
            
            /*$patente->numero_patente = $plate_completa;
            $patente->region = $region;
            $patente->tipo_vehiculo = $tipo_vehiculo;
            $patente->precision = $precision;*/
            $patente->numero = $plate_completa;
            $patente->precision = $precision;
            //GUARDAMOS EL ARCHIVO EN LA CARPETA UPLOADS
            $fileName = date("d-m-Y").'-'.uniqid().$file->getClientOriginalName();
            $file->move($ruta, $fileName);

            //GUARDAMOS LA RUTA DEL ARCHIVO EN LA BD
           // $patente->ruta_imagen = $fileName;

            if($bandera == 0)
                $patente->save();            

            $bandera = 1;
        }

        return redirect()->action('PatentesController@show', ['id' => $patente->id]);
        
    }
    
    //PRUEBA DE POST AL "EVALUADOR"
    public function api(){

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'http://localhost:8081/recognize/license_plate');

        $datos_vehiculo = json_decode($response->getBody()->getContents());
        

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


    public function cache($cachePatente, $key)
    {
        Redis::hmset($key,[$cachePatente]);
    }


    public function apiPlate($ruta){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'http://localhost:8081/recognize/license_plate',[
            'form_params' => [
                'filename' => base64_encode(file_get_contents($ruta))
            ],
        ]);

        $datos_vehiculo = json_decode($response->getBody()->getContents());
        //POST a la API de platerecognizer
        /*$client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'https://api.platerecognizer.com/v1/plate-reader/', [
            'headers' => [
                'authorization' => 'Token d9d0ee29791f3804b51790b672d96679d2ea3748',
            ],
            'form_params' => [
                'upload' => base64_encode(file_get_contents($ruta))
            ],
        ]);

        $datos_vehiculo = json_decode($response->getBody()->getContents());*/
        return $datos_vehiculo;
    }

    public function guardarPatentes($datos_vehiculo){
        dd($datos_vehiculo);    
        //La bandera es para que sólo me guarde los datos que encontró de la patente con más precisión.
        $patente = new Patente;
        $patente->numero = $datos_vehiculo->license_plate;
        $patente->save();
       
        $movimiento = new MovimientoPatente();
        $movimiento->precision = $datos_vehiculo->score;
        $patente1->movimientoPatentes()->save($movimiento);

       /* $bandera = 0;

        foreach($datos_vehiculo->results as $datos){
            $patente = new Patente;

            //DIVIDIR CARACTERES
            $plate = $datos->plate;
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
            //PORCENTAJE DE PRECISIÓN
            $precision = $datos->score * 100;
            
            $patente->numero = $plate_completa;
            //$patente->precision = $precision;

            if($bandera == 0)
                $patente1 = Patente::where("numero", $patente->numero)->firstOrCreate([
                    "numero" => $patente->numero,
                    "modelo" => ""
                ]);
                $movimiento = new MovimientoPatente();
                $movimiento->precision = $precision;
                $patente1->movimientoPatentes()->save($movimiento);

            $bandera = 1;*/
      

    }

}
