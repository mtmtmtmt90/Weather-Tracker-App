<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OpenWeatherServiceAddSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $service;

    public function run()
    {
        $this->service = [
            [
                'name' => 'Open Weather',
                'code' => 'open_weather',
                'path' => 'app\Clients\Service\OpenWeatherService',
                'credentials' => json_encode([
                    'local' => [
                        'endpoint' => 'https://api.openweathermap.org/data/2.5/weather',
                        'api' => '4c7f1f68689243332f5672f3f5d973e0'
                    ],
                    'prod' => [
                        'endpoint' => 'https://api.openweathermap.org/data/2.5/weather',
                        'api' => '4c7f1f68689243332f5672f3f5d973e0'
                    ],
                ]),
                'active' => true,
            ]
        ];

        DB::table('services')->insert($this->service);
    }
}
