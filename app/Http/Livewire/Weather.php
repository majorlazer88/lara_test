<?php

namespace App\Http\Livewire;

use App\Weather\Adapter\USWeatherAdapter;
use Livewire\Component;
use App\Weather\RussianWeather;
use App\Weather\USWeather;

class Weather extends Component
{
    public function render(RussianWeather $RussianWeatherService, USWeather $USWeatherService, USWeatherAdapter $adapter)
    {
        $s1 = new $RussianWeatherService();
        $s1->setPosition('Moscow');

        $russianWeatherData = [
            'moscow',
            'Temperature (C) ' . $s1->getTemperature(),
            'Wind speed (m/s) ' . $s1->getWind(),
            'Temp feelings (C) ' . $s1->getFeelsLikeTemperature(),
        ];

        // $s2 = new $USWeatherService();
        $s2 = new $adapter(new $USWeatherService());
        $s2->setPosition('New-York');

        $USWeatherData = [
            'new-york',
            'Temperature (C) ' . $s2->getTemperature(),
            'Wind speed (m/s) ' . $s2->getWind(),
            'Temp feelings (C) ' . $s2->getFeelsLikeTemperature(),
        ];

        return view('livewire.weather', [
            'rw' => $russianWeatherData,
            'usw' => $USWeatherData,
        ]);
    }
}
