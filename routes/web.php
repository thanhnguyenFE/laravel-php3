<?php

use App\Http\Controllers\Client\ScheduleController;
use Illuminate\Support\Facades\Route;

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
    return view('client.index');
})->name('client.home');
Route::prefix('lich-chieu')->group(function () {
    Route::get('/', [ScheduleController::class, 'list'])->name('client.schedule');
    Route::get('/{date?}', [ScheduleController::class, 'list'])->name('client.schedule.date');
    Route::get('/{slug}/{id?}', [ScheduleController::class, 'show'])->name('client.schedule.detail');
});




