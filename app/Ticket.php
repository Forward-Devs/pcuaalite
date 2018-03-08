<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //
    protected $fillable = ['user_id', 'problema', 'titulo', 'ticket', 'estado'];
    public function user()
    {
      return $this->belongsTo('App\User');
    }
    public function problema()
    {
      return $this->belongsTo('App\Problema');
    }
}
