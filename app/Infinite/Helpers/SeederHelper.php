<?php


namespace App\Infinite\Helpers;

class SeederHelper
{
    public function correctModel($str)
    {
        switch ($str) {
            case "1":
                $model = 'App\Hotel';
                break;
            case "2":
                $model = 'App\Restaurant';
                break;
            case "3":
                $model = 'App\Tour';
                break;
            case "4":
                $model = 'App\Vehicle';
                break;
            default:
                $model = 'App\Venue';
                break;
        }
        return $model;
    }

}