<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesAddSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $cities;

    public function run()
    {
        $this->cities = [
            [
                'name' => 'Abu Dhabi',
                'country' => 'United Arab Emirates',
                'latitude' => 24.466667,
                'longitude' => 54.366669,
                'zip_code' => 51133,
            ],
            [
                'name' => 'Dubai',
                'country' => 'United Arab Emirates',
                'latitude' => 25.276987,
                'longitude' => 55.296249,
                'zip_code' => 00000,
            ],
            [
                'name' => 'Sharjah',
                'country' => 'United Arab Emirates',
                'latitude' => 25.348766,
                'longitude' => 55.405403,
                'zip_code' => 000000,
            ]
        ];

        DB::table('cities')->insert($this->cities);
    }
}
