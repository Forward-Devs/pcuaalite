<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    //
    protected $fillable = ['user_id', 'to_id', 'mensaje'];
}
