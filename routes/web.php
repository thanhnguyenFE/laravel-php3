<?php

use App\Http\Controllers\Client\AuthController;
use App\Http\Controllers\Client\ScheduleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\PaymentController;

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

Route::controller(\App\Http\Controllers\Client\HomeController::class)->group(function () {
    Route::get('/', 'index')->name('client.home');
});

Route::post('/register', [AuthController::class, 'register'])->name('client.register');
Route::post('/login', [AuthController::class, 'login'])->name('client.login');
Route::get('/profile', [AuthController::class, 'profile'])->name('client.profile');
Route::get('/logout', [AuthController::class, 'logout'])->name('client.logout');
Route::match(['put', 'post'],'/profile', [AuthController::class, 'updateProfile'])->name('client.update-profile');

Route::controller(PaymentController::class)->group(function () {
    Route::get('/payment', 'index')->name('payment');
    Route::post('/payment', 'pay')->name('payment');
    Route::get('/payment/callback', 'callback')->name('payment.callback');
    Route::get('/schedules/info', 'infoSchedule');
});

Route::prefix('lich-chieu')->group(function () {
    Route::get('/', [ScheduleController::class, 'list'])->name('client.schedule');
    Route::get('/{date?}', [ScheduleController::class, 'list'])->name('client.schedule.date');
    Route::get('/{slug}/{id?}', [ScheduleController::class, 'show'])->name('client.schedule.detail');
});




