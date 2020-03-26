<?php


namespace Console\Week;

require "vendor/autoload.php";
use PHPHtmlParser\Dom;


class Week
{
    private $days = [];

    public function __construct()
    {
        $this->setData();
    }

    private function setData()
    {
        $dom = new Dom;

        $dom->loadFromUrl('https://www.idokep.hu/idojaras/Pecs');

        for($i=0; $i < 7; $i++){

            $minTemp = $dom->find('.min-homerseklet-default')[$i];
            $maxTemp = $dom->find('.max-homerseklet-default')[$i];

            $this->setMinTemperature($i, $minTemp->text);
            $this->setMaxTemperature($i, $maxTemp->text);
        }
    }

    private function setMaxTemperature($loop, $maxTemp)
    {
        $this->days[$loop]["max"] = $maxTemp;
    }

    private function setMinTemperature($loop, $minTemp)
    {
        $this->days[$loop]["min"] = $minTemp;
    }

    public function getDays()
    {
        return $this->days;
    }
}