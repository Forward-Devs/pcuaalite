<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shout extends Model
{
    //
    const CREATED_AT = 'fecha';
    const UPDATED_AT = 'updated_at';
    protected $fillable = ['user_id', 'shout'];
}
