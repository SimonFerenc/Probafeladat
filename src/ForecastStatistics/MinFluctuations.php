<?php
namespace Console\ForecastStatistics;
use Console\Week\Week;

Class MinFluctuations{

    

    public static function getMinFluctuation($dailyFluctuations)
    {
        $minDailyFluctuations = min($dailyFluctuations);

        return $minDailyFluctuations;
    }
    
}

?>