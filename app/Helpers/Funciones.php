<?php
namespace App\Helpers;
use Carbon;

class Funciones {

     public static function porcentaje($variable)
     {
       $estasemana = 0;
       $pasada = 0;
       foreach ($variable as $var) {
         if (Carbon::createFromTimeStamp(strtotime($var->created_at))->weekOfYear == Carbon::now()->weekOfYear) {
           $estasemana = $estasemana+1;
         }
         if (Carbon::createFromTimeStamp(strtotime($var->created_at))->isLastWeek()) {
           $pasada = $pasada+1;
         }
       }
       if (empty($pasada)) {
         $crec = $estasemana*100;
       }
       else {
         $crec = $estasemana - $pasada / $pasada*100;
       }
       return $crec;
     }
     public static function getSubString($string, $length=NULL)
     {
         if ($length == NULL)
             $length = 50;
         $stringDisplay = substr(strip_tags($string), 0, $length);
         if (strlen(strip_tags($string)) > $length)
             $stringDisplay .= ' ...';
         return $stringDisplay;
     }
}
