<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    //
    protected $table = 'faqs';
    protected $fillable = ['p_es', 'p_en','p_fr','r_es', 'r_en','r_fr'];
}
