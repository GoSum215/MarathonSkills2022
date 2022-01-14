<?php

use App\Http\Controllers\AddMarathonController;
use App\Http\Controllers\InfoMarathon;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\RunnerRegController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/marathons', [InfoMarathon::class, 'getList'])->name('list_marathons');

Route::get('/marathons/{slug}', [InfoMarathon::class, 'getDetails'])->name('info_marathon');

Route::get('/result', function () {
    return view('race_result');
});

Route::match(['get', 'post'],'/runner_registration', RunnerRegController::class)->name('runner_reg');

Route::post('reg_for_marathon/{slug}', [InfoMarathon::class, 'regMarathon'])->name('reg_for_marathon');

Route::get('/calculator', function () {
    return view('calculator');
})->name('calculator');

Route::get('/add_marathon', [AddMarathonController::class, 'create'])->name('add_marathon');

Route::post('/add_marathon/save', [AddMarathonController::class, 'save'])->name('save_marathon');

Route::get('/edit_marathon', function () {
    return view('edit_marathon');
});

Route::match(['get', 'post'], '/registration', RegistrationController::class)->name('registration');

Route::match(['get', 'post'], '/login', LoginController::class)->name('login');

Route::middleware('auth')->group(function () {
    Route::get('/logout', LogoutController::class)->name('logout');
    Route::get('/profile', ProfileController::class)->name('profile');
});
