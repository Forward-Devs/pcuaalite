<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    //
    protected $table = 'actividades';
    protected $fillable = ['user_id', 'es', 'fr', 'en'];
}
