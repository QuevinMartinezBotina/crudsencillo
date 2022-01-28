<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\ProductController;
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

/*
Route::get('/app', function () {
    return view('app');
})->name('principal'); */


Route::resource('/Game', GameController::class);

Route::resource('/Product', ProductController::class);

Route::get('/index', [ProductController::class, 'catalogo'])->name('Game.catalogo');
