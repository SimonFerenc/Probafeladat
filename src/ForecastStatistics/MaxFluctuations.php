<?php
namespace Console\ForecastStatistics;
use Console\Week\Week;

Class MaxFluctuations{


    public static function getMaxFluctuation($dailyFluctuations)
    {
        $maxDailyFluctuations = max($dailyFluctuations);

        return $maxDailyFluctuations;
    }
    
}

?>