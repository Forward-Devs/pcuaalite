<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagina extends Model
{
    protected $fillable = ['tipo', 'href', 'slug', 'titulo_es', 'titulo_en', 'titulo_fr', 'contenido_es', 'contenido_en', 'contenido_fr'];
}
