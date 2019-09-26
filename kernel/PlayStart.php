<?php


namespace kernel;


class PlayStart
{



private $player_pool;
private $stat;
public $arena;

    public function __construct($name_player_1,$name_player_2,$select_arena = 0)
    {
        $this->player_pool = new PlayerPool($name_player_1,$name_player_2);
        $this->stat = new Statistic();
$this->arena = $select_arena;


    }

    private function selectTypeGame()
    {
        if ($this->arena == 0)
        {
            return $this->player_pool->selectPlayerRandom();
        }
        if ($this->arena == 1)
        {
            return$this->player_pool->selectPlayerStepByStep();
        }
}


    public function run()
    {
        echo 'Game Start!'.PHP_EOL;
        echo '_____________________________________________________________________________________________'.PHP_EOL;

        $var_to_init = true;

        while ( $var_to_init) {
            $damage_to_opponent =   $this->selectTypeGame()->selectMove() ;

            $this->player_pool->opponent->health += $damage_to_opponent;



            echo 'Здоровье '.$this->player_pool->opponent->name.' = '.$this->player_pool->opponent->health.PHP_EOL;

            echo 'Здоровье '.$this->player_pool->mover->name.' = '.$this->player_pool->mover->health.PHP_EOL;

            echo '_____________________________________________________________________________________________'.PHP_EOL;


            if ($this->player_pool->opponent->health <= 0)
            {
                echo $this->player_pool->opponent->name.' умер';
                $var_to_init =false;
                $this->stat->saveResultToStorage($this->player_pool->mover->name);
            }
        }
    }



}