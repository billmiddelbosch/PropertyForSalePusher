<?php

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\woningController;
use App\Http\Controllers\woningdetailController;
use App\Http\Controllers\xmlController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


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
Route::post('/home', [HomepageController::class, 'searchDetails'])->name('homepage.searchdetails');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('woningen', [woningController::class, 'viewAll'])->name('woningen-viewall');

Route::get('getXML', [xmlController::class, 'index'])->name('getxml-index');

Route::get('getXML', [xmlController::class, 'index'])->name('getxml-index');

Route::get('/woning/{plaats}/{straat?}/{nr?}/{toev?}', [woningdetailController::class, 'findDetails'])
    ->name('woningdetails-finddetails')
    ->missing(function (Request $request) {
        return Redirect::route('homepage.index');
    });