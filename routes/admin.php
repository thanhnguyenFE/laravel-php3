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

Route::group(['middleware' => 'admin.login'], function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.index');
    Route::resource('movies', \App\Http\Controllers\MovieController::class)->name('movies.index', 'movies');
    Route::resource('categories', \App\Http\Controllers\CategoryController::class)->name('categories.index', 'categories');
    Route::resource('rooms', \App\Http\Controllers\RoomController::class)->name('rooms.index', 'rooms');
    Route::get('/schedules/available-rooms', [ScheduleController::class, 'getAvailableRooms']);
    Route::resource('schedules', ScheduleController::class)->name('schedules.index', 'schedules');
    Route::get('/comments/show', [\App\Http\Controllers\CommentController::class, 'showDetailComment']);
    Route::delete('/comments/{id}', 'App\Http\Controllers\CommentController@destroy')->name('comments.destroy');
    Route::match(['put', 'patch'], '/comments/{id}/update', 'App\Http\Controllers\CommentController@update');
    Route::get('/tickets/show', [\App\Http\Controllers\TicketController::class, 'showDetailTicket']);
    Route::resource('tickets', \App\Http\Controllers\TicketController::class)->name('tickets.index', 'tickets');
    Route::get('/banners/show', [\App\Http\Controllers\BannerController::class, 'showDetailBanner']);
    Route::resource('banners', \App\Http\Controllers\BannerController::class)->name('banners.index', 'banners');
    Route::resource('users', \App\Http\Controllers\UserController::class)->name('users.index', 'users');
    Route::get('/roles/show', [\App\Http\Controllers\RoleController::class, 'showDetailRole']);
    Route::resource('roles', \App\Http\Controllers\RoleController::class)->name('roles.index', 'roles');
});
Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('admin.login');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'loginPost'])->name('admin.login.post');
Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('admin.logout');







