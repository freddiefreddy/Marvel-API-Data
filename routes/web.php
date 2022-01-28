<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarvelController;

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

Route::get('', function () {
    return redirect('characters');
});

Route::get('/characters', [App\Http\Controllers\MarvelController::class, 'index'])->name('home');
