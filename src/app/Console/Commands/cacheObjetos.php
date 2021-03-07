<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;
use App\Models\Patente;

class cacheObjetos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cache:Objetos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Almacena hash con los objetos que no se pueden almacenar en la base de datos';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        
        $keys = Redis::keys('patente:*');
        $patentes= [];
       
        foreach ($keys as $objeto ) {
            $objeto = Redis::hgetall($objeto);
            $patente = Patente::where("numero", $objeto["numero"])->firstOrCreate([
                "numero" => $objeto["numero"], 
                "modelo" => $objeto["modelo"]
            ]);
            $patente->movimientoPatentes()->create([
                'precision' => $objeto["precision"]
            ]);
          
        }
    }
}
