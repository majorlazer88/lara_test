<?php

namespace App\Weather;

use App\Interfaces\WeatherServiceInterface;

class RussianWeather implements WeatherServiceInterface
{
    private string|null $city = null;

    public function getTemperature()
    {
        switch ($this->city) {
            case 'Moscow': return 25;
            case 'Saint-Peterburg': return 10;
            default: return 20;
        }
    }

    public function getWind()
    {
        switch ($this->city) {
            case 'Moscow': return 5;
            case 'Saint-Peterburg': return 13;
            default: return 1;
        }
    }

    public function getFeelsLikeTemperature()
    {
        switch ($this->city) {
            case 'Moscow': return 23;
            case 'Saint-Peterburg': return 16;
            default: return 20;
        }
    }

    public function setPosition(string $city)
    {
        $this->city = $city;
    }
}
