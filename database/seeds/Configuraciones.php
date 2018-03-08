<?php

use Illuminate\Database\Seeder;

class Configuraciones extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('ajustes')->insert([
          'clave' => 'nombre',
          'en' => 'Server',
          'es' => 'Servidor',
          'fr' => 'Server',
          'created_at' => \Carbon::now()->toDateTimeString(),
      ]);
      DB::table('ajustes')->insert([
          'clave' => 'descripcion',
          'en' => 'PCU Automatic developed by ForwardDevs',
          'es' => 'PCU Automática desarrollada por ForwardDevs',
          'fr' => 'PCU Automatic développé par ForwardDevs',
          'created_at' => \Carbon::now()->toDateTimeString(),
      ]);
      DB::table('ajustes')->insert([
          'clave' => 'palabrasclave',
          'en' => 'PCU, UPC, SAMP, SERVIDOR, FORWARDDEVS, META, PHP, SAN ANDREAS, MULTIPLAYER',
          'es' => 'PCU, UPC, SAMP, SERVIDOR, FORWARDDEVS, META, PHP, SAN ANDREAS, MULTIPLAYER',
          'fr' => 'PCU, UPC, SAMP, SERVIDOR, FORWARDDEVS, META, PHP, SAN ANDREAS, MULTIPLAYER',
          'created_at' => \Carbon::now()->toDateTimeString(),
      ]);
      DB::table('ajustes')->insert([
          'clave' => 'logo',
          'en' => 'images/defaultlogo.png',
          'es' => 'images/defaultlogo.png',
          'fr' => 'images/defaultlogo.png',
          'created_at' => \Carbon::now()->toDateTimeString(),
      ]);
      DB::table('ajustes')->insert([
          'clave' => 'logodark',
          'en' => 'images/defaultlogo.png',
          'es' => 'images/defaultlogo.png',
          'fr' => 'images/defaultlogo.png',
          'created_at' => \Carbon::now()->toDateTimeString(),
      ]);

    }
}
