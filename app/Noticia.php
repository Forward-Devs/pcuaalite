<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    //
    protected $fillable = ['user_id', 'fr','en', 'es', 'titulo_es', 'titulo_en', 'titulo_fr', 'portada'];
}
