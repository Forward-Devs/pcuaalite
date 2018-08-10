<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seguidor extends Model
{
    //
    protected $table = 'seguidores';
    protected $fillable = ['user_id', 'follow_id'];
}
