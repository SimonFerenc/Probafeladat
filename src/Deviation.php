<?php

namespace Console;
use Console\Week\Week;

class Deviation {

public static function deviation($dailyFluctuations) 
    { 
        $numofelements = count($dailyFluctuations); 
          
        $variance = 0.0; 
          
                 
        $average = array_sum($dailyFluctuations)/$numofelements; 
          
        foreach($dailyFluctuations as $i) 
        { 
            
            $variance += pow(($i - $average), 2); 
        } 
          
        return $deviation = (float)sqrt($variance/$numofelements); 
    } 
      
}

?>