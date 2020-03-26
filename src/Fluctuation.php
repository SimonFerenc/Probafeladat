<?php

namespace Console;


use Console\Week\Week;

class Fluctuation
{
    public $week;

    public function __construct(Week $week)
    {
        $this->week = $week;
    }

    public function getDailyFluctuations()
    {
        $dailyFluctuations = [];

        foreach ($this->week->getDays() as $day) {
            $dailyFluctuations[] = intval($day["max"]) - intval($day["min"]);
        }

        return $dailyFluctuations;
    }
}