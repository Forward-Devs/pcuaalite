<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    //
    protected $fillable = ['user_id', 'ticket_id', 'reporte_id', 'respuesta'];
    public function user()
    {
      return $this->belongsTo('App\User');
    }
    public function ticket()
    {
      return $this->belongsTo('App\Ticket');
    }
    public function reporte()
    {
      return $this->belongsTo('App\Reporte');
    }
}
