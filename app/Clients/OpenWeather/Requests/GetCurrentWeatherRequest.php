<?php

namespace App\Clients\OpenWeather\Requests;

class GetCurrentWeatherRequest
{
    public function get($url, $query)
    {
        return file_get_contents($url . '?' . $query);
    }
}
