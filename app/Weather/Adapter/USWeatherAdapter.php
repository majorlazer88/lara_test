<?php

namespace App\Weather\Adapter;

use App\Weather\USWeather;
use App\Interfaces\WeatherServiceInterface;

class USWeatherAdapter implements WeatherServiceInterface
{
    private $latitude;
    private $longtitude;
    private $service;

    public function __construct(USWeather $service) {
        $this->service = $service;
    }

    public function getTemperature()
    {
        $tf = $this->service->getTemperature($this->latitude, $this->longtitude);
        return ($tf-32)*5/9; // F -> C
    }

    public function getWind()
    {
        $windFtMin = $this->service->getWind($this->latitude, $this->longtitude);
        return $windFtMin / 196.85; // ft/min -> m/s
    }

    public function getFeelsLikeTemperature() {
        return 1.04*$this->getTemperature()-$this->getWind()*0.65-0.9;
    }

    public function setPosition(string $city)
    {
        switch ($city) {
            case 'Washington':
                $this->latitude = 38.53;
                $this->longtitude = 77.02;
                break;
            case 'New-York':
                $this->latitude = 40.43;
                $this->longtitude = 73.59;
                break;
        }
    }
}
