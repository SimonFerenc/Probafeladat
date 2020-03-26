<?php
namespace Console;
use Console\Week\Week;
   
class Average
{
public static function average($dailyFluctuations){

      $average = array_sum($dailyFluctuations) / count($dailyFluctuations);

 
  return $average;
}
}
?>