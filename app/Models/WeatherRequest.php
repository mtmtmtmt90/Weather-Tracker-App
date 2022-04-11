<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeatherRequest extends Model
{
    protected $fillable = [
        'city_id',
        'weather_condition',
        'temperature',
        'feels_like',
        'humidity',
        'wind_speed',
        'pressure',
        'visibility',
        'sunrise',
        'sunset',
    ];
    use HasFactory;
}
