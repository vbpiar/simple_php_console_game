<?php


namespace kernel;


class Player
{
    private $damage_small;
    private $damage_big;
    private $cure;
    public $health;
    public $name;
    public function __construct($name)
    {
        $this->name=$name;
        $this->cure=rand(18,25);
        $this->damage_big=rand(10,35);
        $this->damage_small= rand(18,25);
        $this->health = 100;
    }

    /**
     * @return int
     */
    private function getDamageSmall()
    {
        echo $this->name.' наносит удар в слабом диапазоне в '.$this->damage_small.PHP_EOL;
        return -$this->damage_small;
    }

    /**
     * @return int
     */
    private function getDamageBig()
    {
        echo $this->name.' наносит удар в сильном диапазоне в '.$this->damage_big.PHP_EOL;
        return -$this->damage_big;
    }

    /**
     * @return int
     */
    private function getCure()
    {
        echo $this->name.' лечится на '.$this->cure.PHP_EOL;
       $this->health += $this->cure;
        return 0;
    }




    public function selectMove()
    {
       $i =  rand(0,2);

        if ($i == 0 || $this->checkForChanceForCure()){
            return $this->getCure();
        }if ($i == 1){
            return $this->getDamageBig();
        }if ($i==2)
        {
            return $this->getDamageSmall();
        }else{
            return false;
        }
    }

    private function checkForChanceForCure()
    {
        if ($this->health < 35)
        {
           $i = rand(0,1);
           if ($i == 0)
           {
               echo $this->name.' получает шанс исцеления'.PHP_EOL;
               return true;
           }else{
               return false;
           }
        }
        else
            {
            return false;
            }

}






}