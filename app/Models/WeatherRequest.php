<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class WeatherRequest extends Model
{
    protected $fillable = [
        'city_id',
        'weather_condition_id',
        'weather_condition_desc',
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

    public function city():HasOne
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }
}
