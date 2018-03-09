<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Schema;

class CrearCrud extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crear:crud {modelo} {tabla}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crear CRUD a base de modelo by FR0Z3NH34R7';

    protected $views = [
        'crud/vistas/editar.stub' => 'editar.blade.php',
        'crud/vistas/inicio.stub' => 'inicio.blade.php',
        'crud/vistas/nuevo.stub' => 'nuevo.blade.php',
    ];
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


        $this->crearDirectorios();

        $controlador = 'Http/Controllers/'.$this->argument('tabla').'Controller.php';
        $columnas = Schema::getColumnListing($this->argument('tabla'));
        $archivonombres = resource_path('nombres/'.$this->argument('tabla').'/nombres.stub');
        $fp = fopen($archivonombres,"w");
        fclose($fp);
        foreach ($columnas as $columna) {
          $nombre = $this->ask('Ingrese el nombre para '.$columna);
          $guardar = "\$nombres = array_add(\$nombres, '".$columna."', '".$nombre."');";
          file_put_contents($archivonombres, PHP_EOL . $guardar, FILE_APPEND);
        }
        $this->exportViews();
        file_put_contents(
            app_path($controlador),
            $this->compilarControlador()
        );

        $mensaje = "Route::resource('".$this->argument('tabla')."', '".$this->argument('tabla')."Controller');";
        $this->info('Generaste el CRUD correctamente.');

        $this->info('No olvides ingresar el "'.$mensaje.'" en tus rutas.');
    }
    protected function compilarControlador()
    {
        $controlador = str_replace(
            '{{modelo}}',
            $this->argument('modelo'),
            file_get_contents('resources/crud/controlador/ControladorBase.stub')
        );

        return str_replace(
            '{{tabla}}',
            $this->argument('tabla'),
            $controlador
        );
    }
    protected function crearDirectorios()
    {
        if (! is_dir($directory = resource_path('views/pca/'.$this->argument('tabla')))) {
            mkdir($directory, 0755, true);
        }
        if (! is_dir($directory = resource_path('nombres/'.$this->argument('tabla')))) {
            mkdir($directory, 0755, true);
        }
    }
    protected function exportViews()
    {
        foreach ($this->views as $key => $value) {
            if (file_exists($view = resource_path('views/pca/'.$this->argument('tabla').'/'.$value))) {
                if (! $this->confirm("La vista [{$value}] ya existe, ¿desea remplazarla?")) {
                    continue;
                }
            }
            file_put_contents(
                $view,
                $this->compilarVistas($key)
            );

        }
    }
    protected function compilarVistas($stub = NULL)
    {
      $nombresss = str_replace(
          '{{nombres}}',
          file_get_contents(resource_path('nombres/'.$this->argument('tabla').'/nombres.stub')),
          file_get_contents('resources/'.$stub)
      );
        $controlador = str_replace(
            '{{modelo}}',
            $this->argument('modelo'),
            $nombresss
        );

        return str_replace(
            '{{tabla}}',
            $this->argument('tabla'),
            $controlador
        );
    }
}
