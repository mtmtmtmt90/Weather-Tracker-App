<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
