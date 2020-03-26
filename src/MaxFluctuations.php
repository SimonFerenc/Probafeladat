<?php
namespace Console;
use Console\Week\Week;

Class MaxFluctuations{

    
    public static function getDailyFluctuations()
    {
        $dailyFluctuations = [];

        foreach ($this->week->getDays() as $day) {
            $dailyFluctuations[] = intval($day["max"]) - intval($day["min"]);
        }

        return $dailyFluctuations;
    }

    public static function getMaxFluctuation($dailyFluctuations)
    {
        $maxDailyFluctuations = max($dailyFluctuations);

        return $maxDailyFluctuations;
    }
    
}

?>