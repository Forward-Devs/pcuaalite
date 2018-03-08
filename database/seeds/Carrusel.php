<?php

use Illuminate\Database\Seeder;

class Carrusel extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('sliders')->insert([
          'imagen' => 'images/slider1.jpg',
          'redireccion' => '#',
          'created_at' => \Carbon::now()->toDateTimeString(),
        ]);
        DB::table('sliders')->insert([
          'imagen' => 'images/slider2.jpg',
          'redireccion' => '#',
          'created_at' => \Carbon::now()->toDateTimeString(),
        ]);
        DB::table('sliders')->insert([
          'imagen' => 'images/slider3.jpg',
          'redireccion' => '#',
          'created_at' => \Carbon::now()->toDateTimeString(),
        ]);
    }
}
