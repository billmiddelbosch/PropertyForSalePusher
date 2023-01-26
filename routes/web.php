<?php

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\MaklrController;
use App\Http\Controllers\woningController;
use App\Http\Controllers\WoonwensenController;
use App\Http\Controllers\xmlController;
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
});

Route::get('/home', [HomepageController::class, 'index'])->name('homepage.index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/woning', [woningController::class, 'viewAll'])->name('woning-viewall');

Route::get('/getXML', [xmlController::class, 'index'])->name('getxml-index');

Route::get('/Makrl', [MaklrController::class, 'index'])->name('maklr-index');

Route::get('/Woonwensen', [WoonwensenController::class, 'loadJSON'])->name('woonwensen-index');
