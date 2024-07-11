<?php

use App\Http\Controllers\ScheduleController;
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
    return view('admin.index');
});

Route::group(['prefix' => 'admin'], function () {
    Route::resource('movies', \App\Http\Controllers\MovieController::class);
    Route::resource('categories', \App\Http\Controllers\CategoryController::class);
    Route::resource('rooms', \App\Http\Controllers\RoomController::class);
    Route::get('/schedules/available-rooms', [ScheduleController::class, 'getAvailableRooms']);
    Route::resource('schedules', ScheduleController::class);
    Route::resource('/comments', \App\Http\Controllers\CommentController::class);
//    Route::resource('tickets', \App\Http\Controllers\TicketController::class);
//    Route::resource('orders', \App\Http\Controllers\OrderController::class);

});

