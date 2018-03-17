<?php
namespace App\Helpers;
use Carbon;

class Funciones {

     public static function getPercent($models)
     {
          $a = 0;
          $b = 0;
          foreach ($models as $model)
          {
              if (Carbon::createFromTimeStamp(strtotime($model->created_at))->weekOfYear == Carbon::now()->weekOfYear) {
                  $a = $a+1;
              } elseif (Carbon::createFromTimeStamp(strtotime($model->created_at))->isLastWeek()) {
                  $b = $b+1;
              }
          }
          if (empty($b)) {
              $c = $a*100;
          } else {
              $c = $a - $b / $b*100;
          }
          return $c;
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
