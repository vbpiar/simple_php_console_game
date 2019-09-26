<?php


namespace kernel;


class PlayerPool
{

    public $player_computer;
    public $player_user;
    public $mover;
public $opponent;
private $step_by_step;

    public function __construct($name_player_1,$name_player_2)
    {
        $this->player_computer = new Player( $name_player_1);

        $this->player_user = new Player( $name_player_2);

        $this->step_by_step = rand(0,1);

    }


    public function selectPlayerRandom()
    {
       $i = rand(0,1);

       if ($i == 0)
       {
           $this->opponent = $this->player_computer;

           return $this->mover = $this->player_user;

       }elseif ($i==1){

           $this->opponent = $this->player_user;

           return $this->mover = $this->player_computer;
       }
        else{
            return false;
        }
    }

    public function selectPlayerStepByStep()
    {
        $i = $this->step_by_step;

        if ($i == 0)
        {
            $this->step_by_step = 1;

            $this->opponent = $this->player_computer;

            return $this->mover = $this->player_user;

        }elseif ($i==1){
            $this->step_by_step = 0;
            $this->opponent = $this->player_user;

            return $this->mover = $this->player_computer;
        }
        else{
            return false;
        }
    }


}