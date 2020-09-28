<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use JasonLewis\ResourceWatcher\Watcher;
use Illuminate\Filesystem\Filesystem;
use JasonLewis\ResourceWatcher\Tracker;
use JasonLewis\ResourceWatcher\Event;
use GuzzleHttp;
use App\Models\Patente;
use App\Http\Controllers\PatentesController;


class images extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'images:imagenes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Verifica el comportamiento de un archivo en un directorio determinado';

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
        /*
        |--------------------------------------------------------------------------
        | Resource Watcher Dependencies
        |--------------------------------------------------------------------------
        |
        | Create a new instance of Illuminate's Filesystem class and of the
        | Resource Watcher's Tracker class. These are dependencies of the Resource
        | Watcher and will be injected into the constructor.
        |
        */

        $files = new Filesystem();
        $tracker = new Tracker();

        /*
        |--------------------------------------------------------------------------
        | Instantiate Resource Watcher
        |--------------------------------------------------------------------------
        |
        | Create a new instance of the Resource Watcher so we can watch resources
        | for any changes.
        |
        */

        $watcher = new Watcher($tracker, $files);

        /*
        |--------------------------------------------------------------------------
        | Watch For Changes
        |--------------------------------------------------------------------------
        |
        | Watch for changes to a resource. The resource given does not need to
        | exist to begin watching.
        |
        */

        $listener = $watcher->watch('public/foscam-images/FI9828P_00626E6E7C62/snap/');

        /*
        |--------------------------------------------------------------------------
        | Create Listener
        |--------------------------------------------------------------------------
        |
        | Listen for any create events that are fired.
        |
        */

        $listener->onCreate(function ($resource, $path) {
            echo "$path was created.".PHP_EOL;

            //Saco la extensión de mi archivo que es escuchado
            $ext = pathinfo($path, PATHINFO_EXTENSION);

            $datos_vehiculo = 'hola';

            //Pregunto si la extensión de mi archivo corresponde a un archivo de imágen
            if($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg'){
                
                $controller = new PatentesController;
                $datos = $controller->apiPlate($path); //Json con mis datos
                $controller->guardarPatentes($datos); //Guardo en la BD
            }

        });

        /*
        |--------------------------------------------------------------------------
        | Delete Listener
        |--------------------------------------------------------------------------
        |
        | Listen for any delete events that are fired.
        |
        */

        $listener->onDelete(function ($resource, $path) {
            echo "{$path} was deleted.".PHP_EOL;
        });

        /*
        |--------------------------------------------------------------------------
        | Modify Listener
        |--------------------------------------------------------------------------
        |
        | Listen for any modify events that are fired.
        |
        */

        $listener->onModify(function ($resource, $path) {
            echo "{$path} was modified.".PHP_EOL;
        });

        /*
        |--------------------------------------------------------------------------
        | Anything Listener
        |--------------------------------------------------------------------------
        |
        | Listen for anything.
        |
        */

        // $listener->onAnything(function ($event, $resource, $path) {
        //     switch ($event->getCode()) {
        //         case Event::RESOURCE_DELETED:
        //             echo "{$path} was deleted (from anything listener).".PHP_EOL;
        //             break;
        //         case Event::RESOURCE_MODIFIED:
        //             echo "{$path} was modified (from anything listener).".PHP_EOL;
        //             break;
        //         case Event::RESOURCE_CREATED:
        //             echo "{$path} was created (from anything listener).".PHP_EOL;
        //             break;
        //     }
        // });

        /*
        |--------------------------------------------------------------------------
        | Start Watching
        |--------------------------------------------------------------------------
        |
        | Now that all the listeners are bound we can start watching. By default
        | the watcher will poll for changes every second. You can adjust this by
        | passing in an optional first parameter. The interval is given in
        | microseconds. 1,000,000 microseconds is 1 second.
        |
        | By default the watch will continue until such time that it's aborted from
        | the terminal. To set a timeout pass in the number of microseconds before
        | the watch will abort as the second parameter.
        |
        */

        $watcher->start();
            }
}
