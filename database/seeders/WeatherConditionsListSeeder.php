<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WeatherConditionsListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $list;

    public function run()
    {
        $this->list = [
            [
                'condition_id' => 200,
                'condition_desc' => 'Thunderstorm with light rain',
                'day_icon' => 'wi-day-thunderstorm',
                'night_icon' => 'wi-night-thunderstorm',
            ],
            [
                'condition_id' => 201,
                'condition_desc' => 'Thunderstorm with rain',
                'day_icon' => 'wi-day-thunderstorm',
                'night_icon' => 'wi-night-thunderstorm',
            ],
            [
                'condition_id' => 202,
                'condition_desc' => 'Thunderstorm with heavy rain',
                'day_icon' => 'wi-day-thunderstorm',
                'night_icon' => 'wi-night-thunderstorm',
            ],
            [
                'condition_id' => 210,
                'condition_desc' => 'Light thunderstorm',
                'day_icon' => 'wi-day-thunderstorm',
                'night_icon' => 'wi-night-thunderstorm',
            ],
            [
                'condition_id' => 211,
                'condition_desc' => 'Thunderstorm',
                'day_icon' => 'wi-day-thunderstorm',
                'night_icon' => 'wi-night-thunderstorm',
            ],
            [
                'condition_id' => 212,
                'condition_desc' => 'Heavy thunderstorm',
                'day_icon' => 'wi-day-lightning',
                'night_icon' => 'wi-night-lightning',
            ],
            [
                'condition_id' => 221,
                'condition_desc' => 'Ragged thunderstorm',
                'day_icon' => 'wi-day-thunderstorm',
                'night_icon' => 'wi-night-thunderstorm',
            ],
            [
                'condition_id' => 230,
                'condition_desc' => 'Thunderstorm with light drizzle',
                'day_icon' => 'wi-day-thunderstorm',
                'night_icon' => 'wi-night-thunderstorm',
            ],
            [
                'condition_id' => 231,
                'condition_desc' => 'Thunderstorm with drizzle',
                'day_icon' => 'wi-day-thunderstorm',
                'night_icon' => 'wi-night-thunderstorm',
            ],
            [
                'condition_id' => 232,
                'condition_desc' => 'Thunderstorm with heavy drizzle',
                'day_icon' => 'wi-day-thunderstorm',
                'night_icon' => 'wi-night-thunderstorm',
            ],
            [
                'condition_id' => 300,
                'condition_desc' => 'Light intensity drizzle',
                'day_icon' => 'wi-day-sprinkle',
                'night_icon' => 'wi-night-sprinkle',
            ],
            [
                'condition_id' => 301,
                'condition_desc' => 'Drizzle',
                'day_icon' => 'wi-day-sprinkle',
                'night_icon' => 'wi-night-sprinkle',
            ],
            [
                'condition_id' => 302,
                'condition_desc' => 'Heavy intensity drizzle',
                'day_icon' => 'wi-day-sprinkle',
                'night_icon' => 'wi-night-sprinkle',
            ],
            [
                'condition_id' => 310,
                'condition_desc' => 'Light intensity drizzle rain',
                'day_icon' => 'wi-day-sprinkle',
                'night_icon' => 'wi-night-sprinkle',
            ],
            [
                'condition_id' => 311,
                'condition_desc' => 'Drizzle rain',
                'day_icon' => 'wi-day-sprinkle',
                'night_icon' => 'wi-night-sprinkle',
            ],
            [
                'condition_id' => 312,
                'condition_desc' => 'Heavy intensity drizzle rain',
                'day_icon' => 'wi-day-sprinkle',
                'night_icon' => 'wi-night-sprinkle',
            ],
            [
                'condition_id' => 313,
                'condition_desc' => 'Shower rain and drizzle',
                'day_icon' => 'wi-day-sprinkle',
                'night_icon' => 'wi-night-sprinkle',
            ],
            [
                'condition_id' => 314,
                'condition_desc' => 'Heavy shower rain and drizzle',
                'day_icon' => 'wi-day-sprinkle',
                'night_icon' => 'wi-night-sprinkle',
            ],
            [
                'condition_id' => 321,
                'condition_desc' => 'Shower drizzle',
                'day_icon' => 'wi-day-sprinkle',
                'night_icon' => 'wi-night-sprinkle',
            ],
            [
                'condition_id' => 500,
                'condition_desc' => 'Light rain',
                'day_icon' => 'wi-day-rain',
                'night_icon' => 'wi-night-rain',
            ],
            [
                'condition_id' => 500,
                'condition_desc' => 'Light rain',
                'day_icon' => 'wi-day-rain',
                'night_icon' => 'wi-night-rain',
            ],
            [
                'condition_id' => 501,
                'condition_desc' => 'Moderate rain',
                'day_icon' => 'wi-day-rain',
                'night_icon' => 'wi-night-rain',
            ],
            [
                'condition_id' => 502,
                'condition_desc' => 'Heavy intensity rain',
                'day_icon' => 'wi-day-rain',
                'night_icon' => 'wi-night-rain',
            ],
            [
                'condition_id' => 503,
                'condition_desc' => 'Very heavy rain',
                'day_icon' => 'wi-day-rain',
                'night_icon' => 'wi-night-rain',
            ],
            [
                'condition_id' => 504,
                'condition_desc' => 'Extreme rain',
                'day_icon' => 'wi-day-rain',
                'night_icon' => 'wi-night-rain',
            ],
            [
                'condition_id' => 511,
                'condition_desc' => 'Freezing rain',
                'day_icon' => 'wi-day-rain-wind',
                'night_icon' => 'wi-night-rain-wind',
            ],
            [
                'condition_id' => 520,
                'condition_desc' => 'Light intensity shower rain',
                'day_icon' => 'wi-day-showers',
                'night_icon' => 'wi-night-showers',
            ],
            [
                'condition_id' => 521,
                'condition_desc' => 'Shower rain',
                'day_icon' => 'wi-day-showers',
                'night_icon' => 'wi-night-showers',
            ],
            [
                'condition_id' => 522,
                'condition_desc' => 'Heavy intensity shower rain',
                'day_icon' => 'wi-day-showers',
                'night_icon' => 'wi-night-showers',
            ],
            [
                'condition_id' => 531,
                'condition_desc' => 'Ragged shower rain',
                'day_icon' => 'wi-day-showers',
                'night_icon' => 'wi-night-showers',
            ],
            [
                'condition_id' => 600,
                'condition_desc' => 'Light snow',
                'day_icon' => 'wi-day-snow',
                'night_icon' => 'wi-night-snow',
            ],
            [
                'condition_id' => 601,
                'condition_desc' => 'Snow',
                'day_icon' => 'wi-day-snow',
                'night_icon' => 'wi-night-snow',
            ],
            [
                'condition_id' => 602,
                'condition_desc' => 'Heavy snow',
                'day_icon' => 'wi-day-snow',
                'night_icon' => 'wi-night-snow',
            ],
            [
                'condition_id' => 611,
                'condition_desc' => 'Sleet',
                'day_icon' => 'wi-day-sleet',
                'night_icon' => 'wi-night-sleet',
            ],
            [
                'condition_id' => 612,
                'condition_desc' => 'Light shower sleet',
                'day_icon' => 'wi-day-sleet',
                'night_icon' => 'wi-night-sleet',
            ],
            [
                'condition_id' => 613,
                'condition_desc' => 'Shower sleet',
                'day_icon' => 'wi-day-sleet',
                'night_icon' => 'wi-night-sleet',
            ],
            [
                'condition_id' => 615,
                'condition_desc' => 'Light rain and snow',
                'day_icon' => 'wi-day-rain-mix',
                'night_icon' => 'wi-night-rain-mix',
            ],
            [
                'condition_id' => 616,
                'condition_desc' => 'Rain and snow',
                'day_icon' => 'wi-day-rain-mix',
                'night_icon' => 'wi-night-rain-mix',
            ],
            [
                'condition_id' => 620,
                'condition_desc' => 'Light shower snow',
                'day_icon' => 'wi-day-rain-mix',
                'night_icon' => 'wi-night-rain-mix',
            ],
            [
                'condition_id' => 621,
                'condition_desc' => 'Shower snow',
                'day_icon' => 'wi-day-rain-mix',
                'night_icon' => 'wi-night-rain-mix',
            ],
            [
                'condition_id' => 622,
                'condition_desc' => 'Heavy shower snow',
                'day_icon' => 'wi-day-rain-mix',
                'night_icon' => 'wi-night-rain-mix',
            ],
            [
                'condition_id' => 701,
                'condition_desc' => 'Mist',
                'day_icon' => 'wi-day-fog',
                'night_icon' => 'wi-night-fog',
            ],
            [
                'condition_id' => 711,
                'condition_desc' => 'Smoke',
                'day_icon' => 'wi-day-smoke',
                'night_icon' => 'wi-night-smoke',
            ],
            [
                'condition_id' => 721,
                'condition_desc' => 'Haze',
                'day_icon' => 'wi-day-fog',
                'night_icon' => 'wi-night-fog',
            ],
            [
                'condition_id' => 731,
                'condition_desc' => 'Dust',
                'day_icon' => 'wi-day-dust',
                'night_icon' => 'wi-night-dust',
            ],
            [
                'condition_id' => 741,
                'condition_desc' => 'Fog',
                'day_icon' => 'wi-day-fog',
                'night_icon' => 'wi-night-fog',
            ],
            [
                'condition_id' => 751,
                'condition_desc' => 'Sand',
                'day_icon' => 'wi-day-dust',
                'night_icon' => 'wi-night-dust',
            ],
            [
                'condition_id' => 761,
                'condition_desc' => 'Dust',
                'day_icon' => 'wi-day-dust',
                'night_icon' => 'wi-night-dust',
            ],
            [
                'condition_id' => 762,
                'condition_desc' => 'Volcanic ash',
                'day_icon' => 'wi-day-volcano',
                'night_icon' => 'wi-night-volcano',
            ],
            [
                'condition_id' => 771,
                'condition_desc' => 'Squalls',
                'day_icon' => 'wi-day-windy',
                'night_icon' => 'wi-night-windy',
            ],
            [
                'condition_id' => 781,
                'condition_desc' => 'Tornado',
                'day_icon' => 'wi-day-tornado',
                'night_icon' => 'wi-night-tornado',
            ],
            [
                'condition_id' => 800,
                'condition_desc' => 'Clear sky',
                'day_icon' => 'wi-day-sunny',
                'night_icon' => 'wi-night-clear',
            ],
            [
                'condition_id' => 801,
                'condition_desc' => 'Few clouds: 11-25%',
                'day_icon' => 'wi-day-cloudy',
                'night_icon' => 'wi-night-cloudy',
            ],
            [
                'condition_id' => 802,
                'condition_desc' => 'Scattered clouds: 25-50%',
                'day_icon' => 'wi-day-cloudy',
                'night_icon' => 'wi-night-cloudy',
            ],
            [
                'condition_id' => 803,
                'condition_desc' => 'Broken clouds: 51-84%',
                'day_icon' => 'wi-day-cloudy-high',
                'night_icon' => 'wi-night-cloudy-high',
            ],
            [
                'condition_id' => 804,
                'condition_desc' => 'Overcast clouds: 85-100%',
                'day_icon' => 'wi-day-cloudy-high',
                'night_icon' => 'wi-night-cloudy-high',
            ],
        ];

        DB::table('weather_conditions')->insert($this->list);
    }
}
