<?php

use Illuminate\Database\Seeder;

class Problemas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('problemas')->insert([
          'es' => 'Tengo problemas para ingresar al juego',
          'en' => 'I have problems to enter the game',
          'fr' => 'J\'ai des problèmes pour entrer dans le jeu',
          'created_at' => \Carbon::now()->toDateTimeString(),
        ]);
        DB::table('problemas')->insert([
          'es' => 'Mis objetos han desaparecido',
          'en' => 'My objects have disappeared',
          'fr' => 'Mes objets ont disparu',
          'created_at' => \Carbon::now()->toDateTimeString(),
        ]);
        DB::table('problemas')->insert([
          'es' => 'No recuerdo mi contraseña del juego',
          'en' => 'I do not remember my game password',
          'fr' => 'Je ne me souviens pas de mon mot de passe du jeu',
          'created_at' => \Carbon::now()->toDateTimeString(),
        ]);
        DB::table('problemas')->insert([
          'es' => 'Mi cuenta se encuentra bloqueada',
          'en' => 'My account is blocked',
          'fr' => 'Mon compte est bloqué',
          'created_at' => \Carbon::now()->toDateTimeString(),
        ]);
        DB::table('problemas')->insert([
          'es' => 'El servidor me kickea automáticamente',
          'en' => 'The server automatically kicks me',
          'fr' => 'Le serveur me donne automatiquement un coup de pied',
          'created_at' => \Carbon::now()->toDateTimeString(),
        ]);
        DB::table('problemas')->insert([
          'es' => 'Me han sancionado injustamente',
          'en' => 'I have been unfairly sanctioned',
          'fr' => 'J\'ai été injustement sanctionné',
          'created_at' => \Carbon::now()->toDateTimeString(),
        ]);
        DB::table('problemas')->insert([
          'es' => 'Tengo problemas dentro del juego',
          'en' => 'I have problems in the game',
          'fr' => 'J\'ai des problèmes dans le jeu',
          'created_at' => \Carbon::now()->toDateTimeString(),
        ]);
        DB::table('problemas')->insert([
          'es' => 'Otro',
          'en' => 'Other',
          'fr' => 'Autre',
          'created_at' => \Carbon::now()->toDateTimeString(),
        ]);
    }
}
