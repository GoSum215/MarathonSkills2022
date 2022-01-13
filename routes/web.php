<?php

use App\Http\Controllers\AddMarathonController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
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

Route::get('/list', function () {
    return view('list_marathons');
});

Route::get('/result', function () {
    return view('race_result');
});

Route::get('/info', function () {
    return view('info_about_marathon');
});

Route::get('/calculator', function () {
    return view('calculator');
});

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
