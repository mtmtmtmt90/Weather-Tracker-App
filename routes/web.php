<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Common\OpenWeatherController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dd', function () {

    $data = (new OpenWeatherController())->getWeatherHistory();
    dd($data);

});
Route::get('/', [OpenWeatherController::class, 'index']);
Route::get('/current', [OpenWeatherController::class, 'currentWeather']);
Route::post('/getHistory', [OpenWeatherController::class, 'getWeatherHistory']);

Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false,
    'register' => false,
]);

Route::group(['middleware' => 'auth'], function(){
    Route::prefix('/dashboard')->group(function () {
        Route::get('/', [OpenWeatherController::class, 'main']);
        Route::prefix('/city/{id}')->group(function () {
            Route::get('/', [OpenWeatherController::class, 'countryData']);
            Route::prefix('/date/{date}')->group(function () {
                Route::get('/', [OpenWeatherController::class, 'dateData']);
            });
        });
        Route::prefix('/record')->group(function () {
            Route::get('/edit/{id}', [OpenWeatherController::class, 'recordEdit']);
            Route::post('/save/{id}', [OpenWeatherController::class, 'recordSave']);
        });
    });
});
