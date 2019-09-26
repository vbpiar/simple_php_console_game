<?php


namespace kernel;


class Statistic
{
public $file_direction = "../storage/static.txt";

    public function saveResultToStorage($name_of_winner)
    {
     $file = file_get_contents($this->file_direction);

    $file = json_decode($file,true);

$file[$name_of_winner] += 1;


$file = json_encode($file);

file_put_contents($this->file_direction,$file);

    }

    public function getResults()
    {
        $file = file_get_contents($this->file_direction);
        $file = json_decode($file,true);

        foreach ($file as $key => $item) {

            echo $key.' win '.$item.PHP_EOL;
        }
    }

    public function deleteStat()
    {
        $file = file_get_contents($this->file_direction);

        $file = json_decode($file,true);

        foreach ($file as &$value)
        {
            $value = 0;
        }


        $file = json_encode($file);

        file_put_contents($this->file_direction,$file);
        echo 'Stat delete';
    }


}