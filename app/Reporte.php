<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    //
    protected $fillable = ['user_id', 'reportado_id', 'razon', 'reporte', 'estado'];
    public function user()
    {
      return $this->belongsTo('App\User');
    }
    public function reportado()
    {
      return $this->belongsTo('App\User');
    }
}
