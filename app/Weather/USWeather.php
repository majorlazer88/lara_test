<?php

namespace App\Weather;

class USWeather
{
    public function getTemperature(float $latitude, float $longtitude)
    {
        if ($latitude == 38.53 && $longtitude == 77.02) {
            return 86;
        } else {
            if ($latitude == 40.43 && $longtitude == 73.59) {
                return 95;
            } else {
                return 80;
            }
        }
    }

    public function getWind(float $latitude, float $longtitude)
    {
        if ($latitude == 38.53 && $longtitude == 77.02) {
            return 1000;
        } else {
            if ($latitude == 40.43 && $longtitude == 73.59) {
                return 2000;
            } else {
                return 1500;
            }
        }
    }
}
