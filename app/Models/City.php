<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    protected $fillable = [
        'name',
        'country',
        'latitude',
        'longitude',
        'zip_code',
        'active',
    ];

    use HasFactory;

    public function weather() : HasMany
    {
        return $this->hasMany(WeatherRequest::class, 'city_id', 'id');
    }
}
