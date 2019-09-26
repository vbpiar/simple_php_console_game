<?php


namespace kernel;

// Class is need to select the mode which player want to run
// Check for 2 parameters argv , argc
class ModeSelector
{

    public function __construct($argc,$argv)
    {

        if ($argc == 1) // If mode is empty
        {
            echo "Chose a mod to run :
                     where {0-999} is optional you can set count times game would be play , by default 1 time
                     
            -play {0-999} random_players name_of_first_player name_of_second_player
            -play {0-999} step_by_step name_of_first_player name_of_second_player
            -get_stat (To get Static for names of players who win)
            -unset_stat
            ";
        }
        elseif ($argc == 2 )
        {
            if ($argv[1] == '-get_stat') // return statistics
            {
                $a = new Statistic();
                $a->getResults();
            }

            elseif ($argv[1] == '-unset_stat') // unset statistics result
            {
                $a = new Statistic();
                $a->deleteStat();
            }
        }
        elseif ($argc == 3 || $argc ==4 )
        {
            if ($argv[1] == '-play') // mode to play game set users name sa default
            {
                if ($argv[2] == 'random_players')
                {
                    $a = new \kernel\PlayStart('Компьютер','Пользователь',0);
                    $a->run();

                }elseif ($argv[2] == 'step_by_step')
                {
                    $a = new \kernel\PlayStart($argv[3],$argv[4],1);
                    $a->run();

                }elseif (preg_match('/[0-9]{1,5}/',$argv[2]) )
                {
                    if ($argv[3] == 'random_players') {
                        for ($i = 0; $i < $argv[2]; $i++) {


                        $a = new \kernel\PlayStart('Компьютер', 'Пользователь', 0);
                        $a->run();
                    }
                    }elseif ($argv[3] == 'step_by_step')
                    {
                        for ($i = 0; $i < $argv[2]; $i++) {
                            $a = new \kernel\PlayStart('Компьютер', 'Пользователь', 1);
                            $a->run();
                        }
                    }

                }


            }
        }elseif ($argc == 5 || $argc ==6) //expects mode play and parameters to name of user
        {
            if ($argv[1] == '-play')
            {
                if ($argv[2] == 'random_players')
                {
                    $a = new \kernel\PlayStart($argv[3],$argv[4],0);
                    $a->run();

                }elseif ($argv[2] == 'step_by_step')
                {
                    $a = new \kernel\PlayStart($argv[3],$argv[4],1);
                    $a->run();

                }
                elseif (preg_match('/[0-9]{1,5}/',$argv[2]) )
                {

                    if ($argv[3] == 'random_players')
                    {
                        for ($i = 0; $i < $argv[2]; $i++) {
                            $a = new \kernel\PlayStart($argv[4], $argv[5], 0);
                            $a->run();
                        }
                    }elseif ($argv[3] == 'step_by_step')
                    {
                        for ($i = 0; $i < $argv[2]; $i++) {
                            $a = new \kernel\PlayStart($argv[4], $argv[5], 1);
                            $a->run();
                        }
                    }

                }
            }
        }





    }
}