<?php
namespace Console;
use Console\Week\Week;

Class MinFluctuations{

    
    public static function getDailyFluctuations()
    {
        $dailyFluctuations = [];

        foreach ($this->week->getDays() as $day) {
            $dailyFluctuations[] = intval($day["max"]) - intval($day["min"]);
        }

        return $dailyFluctuations;
    }

    public static function getMinFluctuation($dailyFluctuations)
    {
        $minDailyFluctuations = min($dailyFluctuations);

        return $minDailyFluctuations;
    }
    
}

?>