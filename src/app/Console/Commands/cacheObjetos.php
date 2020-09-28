<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;
use App\Patentes;

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
        
        $key = 'Patnete:*';
        $stored = Redis::hgetall($key);

        $keys = Redis::keys('*');
       // dd($keys);
        foreach ($keys as $objeto ) {
            $claves = explode('alp_learning_database_', $objeto);
            echo $claves[1];
            $result = Redis::hgetall($claves[1]);
            var_dump($result);
            
        }
        //$patente = Redis::hgetall('Patnete:AA975PI');
        //dd($patente);
    }
}
