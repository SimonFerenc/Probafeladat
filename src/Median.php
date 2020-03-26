<?php
namespace Console;
use Console\Week\Week;
   
class Median
{
    
    public static function median($dailyFluctuations) {
        
            $count = count($dailyFluctuations); 
            $middleval = floor(($count-1)/2); 
            if($count % 2) { 
                $median = $dailyFluctuations[$middleval];
            } else { 
                $low = $dailyFluctuations[$middleval];
                $high = $dailyFluctuations[$middleval+1];
                $median = (($low+$high)/2);
            }
            return $median;
        
    } 

}
 