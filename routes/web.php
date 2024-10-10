<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserRegistrationController;
use App\Http\Controllers\VaccineScheduleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('login-attempt', [LoginController::class, 'loginProcess']);

Route::get('register', [UserRegistrationController::class, 'register']);
Route::post('register', [UserRegistrationController::class, 'registerUser']);

Route::get('search', [SearchController::class, 'search']);

Route::group(['middleware' => ['auth'], 'prefix' => '/user'], function () {
    Route::get('profile', [UserController::class, 'profile']);
    Route::get('logout', [LoginController::class, 'logout']);
    Route::get('create-schedule', [VaccineScheduleController::class, 'createSchedule']);
    Route::post('store-schedule', [VaccineScheduleController::class, 'storeSchedule']);
});
