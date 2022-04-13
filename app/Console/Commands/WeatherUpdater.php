<?php

namespace App\Console\Commands;

use App\Clients\OpenWeather\Services\OpenWeatherService;
use App\Models\City;
use App\Models\WeatherRequest;
use Illuminate\Console\Command;

class WeatherUpdater extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:weather {id?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Weather updater';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if ($this->hasArgument('id')){
            $id = $this->argument('id');
        }

        $service = new OpenWeatherService();

        if ($id) {
            $cities = City::where('id', $id)->get();
        } else {
            $cities = City::all();
        }

        foreach ($cities as $city) {

            $data = $service->currentWeather($city->latitude, $city->longitude);
            $data = json_decode($data, true);

            if (!empty($data) && $data['cod'] === 200) {
                $this->saveToDatabase($city->id, $data);
            }
        }

        return 0;
    }

    public function saveToDatabase($id, $data)
    {
        $record = WeatherRequest::create([
            'city_id' => $id,
            'weather_condition_id' => $data['weather'][0]['id'],
            'weather_condition_desc' => $data['weather'][0]['description'],
            'temperature' => $data['main']['temp'],
            'feels_like' => $data['main']['feels_like'],
            'humidity' => $data['main']['humidity'],
            'wind_speed' => $data['wind']['speed'] * 3.6,
            'pressure' => $data['main']['pressure'],
            'visibility' => $data['visibility'],
            'sunrise' => $data['sys']['sunrise'],
            'sunset' => $data['sys']['sunset'],
        ]);

        $record->save();
    }
}
