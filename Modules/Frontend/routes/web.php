<?php

use Illuminate\Support\Facades\Route;
use Modules\Frontend\app\Http\Controllers\FrontendController;

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

Route::redirect('/', '/screen-1');
Route::get('/screen-1', [FrontendController::class, 'screen1'])->name('screen-1');
Route::get('/screen-2', [FrontendController::class, 'screen2'])->name('screen-2');
Route::get('/screen-3', [FrontendController::class, 'screen3'])->name('screen-3');
Route::get('/screen-4', [FrontendController::class, 'screen4'])->name('screen-4');
Route::get('/screen-5', [FrontendController::class, 'screen5'])->name('screen-5');
Route::get('/screen-6', [FrontendController::class, 'screen6'])->name('screen-6');
Route::get('/get-latest-devices-data', [FrontendController::class, 'getLatestDevicesData'])->name('get-latest-devices-data');