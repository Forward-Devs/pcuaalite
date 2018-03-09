<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->call([
        Usuario::class,
        Configuraciones::class,
        Noticias::class,
        Actividades::class,
        Problemas::class,
  ]);
    }
}
