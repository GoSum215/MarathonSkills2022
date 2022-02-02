<?php

use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ApiMarathon;
use App\Http\Controllers\ApiRegRunnerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/marathons', [ApiMarathon::class, 'index']);
Route::get('/marathons/{slug}', [ApiMarathon::class, 'show']);

Route::post('/registration', [ApiAuthController::class, 'register']);
Route::post('/login', [ApiAuthController::class, 'login']);
Route::post('/runner_registration', [ApiRegRunnerController::class, 'add_runner']);
Route::post('/reg_for_marathon/{slug}', [ApiRegRunnerController::class, 'reg_runner_marathon']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [ApiAuthController::class, 'logout']);
    Route::post('/profile', [ApiAuthController::class, 'profile']);
});
