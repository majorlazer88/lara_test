<?php

namespace App\Interfaces;

interface WeatherServiceInterface
{
    function getTemperature();
    function getWind();
    function getFeelsLikeTemperature();
    function setPosition(String $city);
}
