<?php

use App\Http\Controllers\Client\AuthController;
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
Route::post('/register', [AuthController::class, 'register'])->name('client.register');
Route::post('/login', [AuthController::class, 'login'])->name('client.login');
Route::get('/profile', [AuthController::class, 'profile'])->name('client.profile');
Route::get('/logout', [AuthController::class, 'logout'])->name('client.logout');
Route::match(['put', 'post'],'/profile', [AuthController::class, 'updateProfile'])->name('client.update-profile');

Route::prefix('lich-chieu')->group(function () {
    Route::get('/', [ScheduleController::class, 'list'])->name('client.schedule');
    Route::get('/{date?}', [ScheduleController::class, 'list'])->name('client.schedule.date');
    Route::get('/{slug}/{id?}', [ScheduleController::class, 'show'])->name('client.schedule.detail');
});


//<div class="flex items-center justify-center gap-4 flex-wrap">
//                <button type="button" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none
//        focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80
//        font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
//Tài khoản của tôi
//</button>
//                <button type="button" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-red-400 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700
//            dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
//                    <a href="" class="p-0 block w-full">Lịch sử mua vé</a>
//                </button>
//            </div>



