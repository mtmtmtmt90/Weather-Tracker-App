<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeatherCondition extends Model
{
    use HasFactory;

    protected $fillable = [
        'condition_id',
        'condition_desc',
        'day_icon',
        'night_icon',
    ];
}
