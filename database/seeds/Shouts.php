<?php

use Illuminate\Database\Seeder;

class Shouts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('shouts')->insert([
        'user_id' => '1',
        'shout' => 'PCU instalado',
        'created_at' => \Carbon::now()->toDateTimeString(),
      ]);
    }
}
