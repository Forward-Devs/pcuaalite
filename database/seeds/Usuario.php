<?php

use Illuminate\Database\Seeder;

class Usuario extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
          'name' => 'Admin',
          'email' => 'admin@pcu.com',
          'password' => '$2y$10$iny5nGfFISQpSH.cUAEG2.9Gx.iIZv9eJji2V.DDBBU4oDQhaWqTy', //adminpcu
          'admin' => '1',
          'developer' => '1',
          'created_at' => \Carbon::now()->toDateTimeString(),
        ]);
    }
}
