<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeatherRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weather_requests', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('city_id');
            $table->integer('weather_condition_id');
            $table->string('weather_condition_desc');
            $table->float('temperature');
            $table->float('feels_like');
            $table->float('humidity');
            $table->float('wind_speed');
            $table->float('pressure');
            $table->float('visibility');
            $table->integer('sunrise');
            $table->integer('sunset');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weather_requests');
    }
}
