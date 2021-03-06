<?php namespace Console;
use Console\Week\Week;
use Console\ForecastStatistics\Median;
use Console\ForecastStatistics\Fluctuation;
use Console\ForecastStatistics\Average;
use Console\ForecastStatistics\Deviation;
use Console\ForecastStatistics\MaxFluctuations;
use Console\ForecastStatistics\MinFluctuations;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\Command as SymfonyCommand;


class ForecastCommand extends SymfonyCommand
{
    
    public function configure()
    {
        $this
            ->setName('what')
            ->setDescription('Get the values')
            ->setHelp('This command allows you to get the values')
            ->addArgument('forecastStatistic', InputArgument::REQUIRED, 'forecast');

    }

    public function execute(InputInterface $input, OutputInterface $output)
    {

        $week = new Week();
        $fluctuation = new Fluctuation($week);
        $dailyFluctuations = $fluctuation->getDailyFluctuations();

        $median = Median::median($dailyFluctuations);
        $deviation = Deviation::deviation($dailyFluctuations);
        $average = Average::average($dailyFluctuations);
        $maxDailyFluctuations = MaxFluctuations::getMaxFluctuation($dailyFluctuations);
        $minDailyFluctuations = MinFluctuations::getMinFluctuation($dailyFluctuations);

        switch ($input->getArgument("forecastStatistic")) {
            case "median":
                $output -> write("A medián: " .$median) ;
                break;
            case "deviation":
                $output -> write("A szórás: " .$deviation) ;
                break;
            case "average":
                $output -> write("Az átlag: " .$average) ;
                break;    
            case "maxdaily":
               $output -> write("A legnagyobb hőingás: " .$maxDailyFluctuations) ;
                break;
            case "mindaily":
                $output -> write("A legkisebb hőingás: " .$minDailyFluctuations) ;
                 break;    
                default:
                $output -> write("A következő értéket adja meg: median, deviation, average, maxdaily, mindaily") ;
        }


        
        
        
    }
}
