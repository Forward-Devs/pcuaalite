<?php

use Illuminate\Database\Seeder;

class Actividades extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('actividades')->insert([
          'user_id' => '1', // Esto es un seeder para el primer usuario, el que se crea al instalar la web.
          'es' => 'se registró.',
          'en' => 'was registered.',
          'fr' => 'a été enregistré.',
          'created_at' => \Carbon::now()->toDateTimeString(),
        ]);
    }
}
