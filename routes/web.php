<?php

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
});
