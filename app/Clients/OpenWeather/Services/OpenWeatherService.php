<?php

namespace App\Clients\OpenWeather\Services;

use App\Clients\OpenWeather\Requests\GetCurrentWeatherRequest;
use App\Models\Service;

class OpenWeatherService
{
    protected $apiKey;
    protected $service;
    protected $url;

    public function __construct()
    {
        $this->service = Service::where('code', 'open_weather')->first();
        $credentials = json_decode($this->service->credentials, true);

        if (env('APP_ENV') === 'prod') {
            $this->url = $credentials['prod']['endpoint'];
            $this->apiKey = $credentials['prod']['api'];
        } else {
            $this->url = $credentials['local']['endpoint'];
            $this->apiKey = $credentials['local']['api'];
        }
    }

    public function currentWeather(float $lat, float $lon, $mode = null, $units = 'metric', $lang = null)
    {
        if (!$lat || !$lon) {
            return null;
        }

        $query = 'lat=' . $lat . '&lon=' . $lon . '&appid=' . $this->apiKey .'&units=' . $units;

        if ($mode) {
            $query .= '&mode=' . $mode;
        }

        if ($lang) {
            $query .= '&lang=' . $lang;
        }

        $request = new GetCurrentWeatherRequest();

        return $request->get($this->url, $query);

    }
}
