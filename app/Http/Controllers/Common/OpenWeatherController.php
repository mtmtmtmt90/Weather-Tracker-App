<?php

namespace App\Http\Controllers\Common;

use App\Clients\OpenWeather\Services\OpenWeatherService;
use App\Http\Controllers\Controller;
use App\Http\Requests\GetHistoryRequest;
use App\Models\City;
use App\Models\Service;
use App\Models\WeatherCondition;
use App\Models\WeatherRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

class OpenWeatherController extends Controller
{
    protected $service;
    protected $startDate;
    protected $endDate;

    public function __construct()
    {
        $this->service = new OpenWeatherService();
    }
    public function index()
    {
        $response = $this->currentWeather(false);
        $weatherConditions = WeatherCondition::all();

        return view('client.index', [
            'response' => json_encode($response),
            'weather_conditions' => $weatherConditions,
        ]);
    }

    public function currentWeather($fromRoute = true)
    {
        $cities = City::all();

        foreach ($cities as $city) {
            $data = $this->service->currentWeather($city->latitude, $city->longitude);
            $data = json_decode($data, true);

            $record = WeatherRequest::create([
                'city_id' => $city->id,
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

            $weatherCondition = WeatherCondition::where('condition_id', $data['weather'][0]['id'])->first();
            $response[$city->name] = [
                'day_icon' => $weatherCondition->day_icon,
                'night_icon' => $weatherCondition->night_icon,
                'record' => $record,
            ];

        }

        if ($fromRoute) {
            return new JsonResponse(json_encode($response), 200);
        } else {
            return $response;
        }

    }

    public function getWeatherHistory(GetHistoryRequest $request): JsonResponse
    {
        try {
            Log::debug('geldi');
            Log::debug(json_encode(print_r($request->all(), true)));
            $reqCities = explode(',', $request->cities);
            $this->startDate = date('Y-m-d',strtotime($request->startDate));
            $this->endDate = date('Y-m-d',strtotime($request->endDate));
            $weatherConditions = WeatherCondition::all();
            $tempAbove = $request->temp_above;
            $tempBelow = $request->temp_below;
            $weatherConditionsIds = explode(',', $request->conditions);

            Log::debug($this->startDate);
            Log::debug($this->endDate);
            Log::debug(json_encode($reqCities));

            $cities = City::with(['weather' => function ($query) {
                return $query->whereDate('created_at', '>=', $this->startDate)
                    ->whereDate('created_at', '<=', $this->endDate)->get();
            }])->whereIn('name', $reqCities)->get();

            $list = [];

            Log::debug(json_encode($cities));

            foreach ($cities as $city){

                $list[$city->name] = [];

                foreach ($city->weather as $weather){

                    $date = $weather->created_at->format('d.m.Y');
                    $list[$city->name][$date]['weather_condition_id'][] = $weather->weather_condition_id;
                    $list[$city->name][$date]['temperature'][] = $weather->temperature;
                    $list[$city->name][$date]['feels_like'][] = $weather->feels_like;
                    $list[$city->name][$date]['humidity'][] = $weather->humidity;
                    $list[$city->name][$date]['wind_speed'][] = $weather->wind_speed;
                    $list[$city->name][$date]['pressure'][] = $weather->pressure;
                    $list[$city->name][$date]['visibility'][] = $weather->visibility;

                }

                foreach ($list[$city->name] as $day=>$val){

                    $condId = $this->frequentlyRepeated($val['weather_condition_id']);
                    $condition = $weatherConditions->where('condition_id', $condId)->first();
                    $list[$city->name][$day]['weather_condition_id'] = $condition->condition_id;
                    $list[$city->name][$day]['weather_condition_desc'] = $condition->condition_desc;
                    $list[$city->name][$day]['day_icon'] = $condition->day_icon;
                    $list[$city->name][$day]['night_icon'] = $condition->night_icon;
                    $list[$city->name][$day]['temperature'] = floor($this->average($val['temperature']));
                    $list[$city->name][$day]['feels_like'] = floor($this->average($val['feels_like']));
                    $list[$city->name][$day]['humidity'] = floor($this->average($val['humidity']));
                    $list[$city->name][$day]['wind_speed'] = floor($this->average($val['wind_speed']));
                    $list[$city->name][$day]['pressure'] = floor($this->average($val['pressure']) / 10);
                    $list[$city->name][$day]['visibility'] = floor($this->average($val['visibility']) / 1000);

                    if (in_array($condId, $weatherConditionsIds)
                        && ($tempAbove <= floor($list[$city->name][$day]['temperature']))
                        && ($tempBelow >= floor($list[$city->name][$day]['temperature']))) {
                        $list[$city->name][$day]['available'] = true;
                    } else {
                        unset($list[$city->name][$day]);
                    }

                }
            }

            Log::debug(json_encode(print_r($list, true)));

            return new JsonResponse([
                'body' => $list
            ], 200);

        }catch (\Exception $e){
            Log::debug(json_encode($e));
            return new JsonResponse([
                'success' => false,
                'message' => 'Technical problems have occurred'
            ], 500);
        }
    }

    public function frequentlyRepeated($array)
    {
        $tmp = array_count_values($array);
        arsort($tmp);

        foreach ($tmp as $key=>$val){
            return $key;
        }
    }

    public function average($array)
    {
        return array_sum($array) / count($array);
    }

    public function main()
    {
//        $route = Route::getCurrentRoute();
//        dd($route);
        $cities = City::all();
        return view('dashboard.main', [
            'cities' => $cities
        ]);
    }

    public function countryData(Request $request)
    {
        $id = $request->id;
        $city = City::where('id', $id)->first();
        $weathers = $city->weather;

        $list = [];
        foreach ($weathers as $weather){
            $date = $weather->created_at->format('d.m.Y');
            $list[$date] = $weather->created_at->format('d-m-Y');
        }

        return view('dashboard.dates', [
            'city' => $city,
            'list' => $list,
        ]);
    }

    protected $date;

    public function dateData(Request $request)
    {
        $id = $request->id;
        $this->date = date('Y-m-d', strtotime($request->date));
        $city = City::where('id', $id)->first();
        $weathers = WeatherRequest::where('city_id', $city->id)
            ->whereDate('created_at', '=', $this->date)->simplePaginate(20);

        return view('dashboard.records', [
            'city' => $city,
            'weathers' => $weathers,
        ]);
    }

    public function recordEdit(Request $request)
    {
        $id = $request->id;
        $weather = WeatherRequest::where('id', $id)->first();
        $city = $weather->city;
        $conditions = WeatherCondition::get();

        return view('dashboard.editor', [
            'weather' => $weather,
            'city' => $city,
            'conditions' => $conditions,
        ]);

    }

    public function recordSave(Request $request)
    {
        $id = $request->record_id;
        $condition = $request->condition;
        $temperature = $request->temperature;
        $feels = $request->feels_like;
        $humidity = $request->humidity;
        $wind_speed = $request->wind_speed;
        $condition_desc = WeatherCondition::where('condition_id', $condition)->first()->condition_desc;

        $record = WeatherRequest::where('id', $id)->first();
        $record->weather_condition_id = $condition;
        $record->weather_condition_desc = $condition_desc;
        $record->temperature = $temperature;
        $record->feels_like = $feels;
        $record->humidity = $humidity;
        $record->wind_speed = $wind_speed;

        if ($record->save()) {
            return new JsonResponse([
                'status' => true,
                'message' => 'Successfully saved'
            ],200);
        } else {
            return new JsonResponse([
                'status' => false,
                'message' => 'Something went wrong'
            ],200);
        }
    }
}
