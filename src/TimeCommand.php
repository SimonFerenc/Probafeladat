<?php namespace Console;
use Console\Week\Week;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\Command as SymfonyCommand;


class TimeCommand extends SymfonyCommand
{
    
    public function configure()
    {
        $this
            ->setName('what')
            ->setDescription('Greet a user based on the time of the day.')
            ->setHelp('This command allows you to greet a user based on the time of the day...')
            ->addArgument('forecastStatistic', InputArgument::REQUIRED, 'foecast');

    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
                
                
        $output -> writeln([
            '====**** User Greetings Console App ****====',
            '==========================================',
            '',
        ]);

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
                $output -> write("A következő értéket adja meg: median, deviation, average") ;
        }


        
        
        
    }
}
