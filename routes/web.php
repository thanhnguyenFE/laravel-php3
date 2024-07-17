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
    return view('client.index');
})->name('client.home');
Route::get('/lich-chieu', function () {
    return view('client.schedule');
})->name('client.schedule');
Route::get('/lich-chieu/detail', function () {
    return view('client.schedule_detail');
})->name('client.schedule.detail');

Route::group(['prefix' => 'admin'], function () {
    Route::resource('movies', \App\Http\Controllers\MovieController::class);
    Route::resource('categories', \App\Http\Controllers\CategoryController::class);
    Route::resource('rooms', \App\Http\Controllers\RoomController::class);
    Route::get('/schedules/available-rooms', [ScheduleController::class, 'getAvailableRooms']);
    Route::resource('schedules', ScheduleController::class);
    Route::get('/comments/show', [\App\Http\Controllers\CommentController::class, 'showDetailComment']);
    Route::delete('/comments/{id}', 'App\Http\Controllers\CommentController@destroy')->name('comments.destroy');
    Route::match(['put', 'patch'], '/comments/{id}/update', 'App\Http\Controllers\CommentController@update');
    Route::get('/tickets/show', [\App\Http\Controllers\TicketController::class, 'showDetailTicket']);
    Route::resource('tickets', \App\Http\Controllers\TicketController::class);
    Route::get('/banners/show', [\App\Http\Controllers\BannerController::class, 'showDetailBanner']);
    Route::resource('banners', \App\Http\Controllers\BannerController::class);
    Route::resource('users', \App\Http\Controllers\UserController::class);
    Route::get('/roles/show', [\App\Http\Controllers\RoleController::class, 'showDetailRole']);
    Route::resource('roles', \App\Http\Controllers\RoleController::class);
});



