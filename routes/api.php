<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::controller(\App\Http\Controllers\ColumnController::class)->group(function (){
        Route::get('/columns', 'index')->name('columns.index');
        Route::post('/columns', 'store')->name('columns.store');
        Route::put('/columns/{column}', 'update')->name('columns.update');
        Route::delete('/columns/{column}', 'destroy')->name('columns.destroy');
    });

    Route::controller(\App\Http\Controllers\CardController::class)->group(function (){
        Route::get('/cards', 'index')->name('cards.index');
        Route::post('/cards', 'store')->name('cards.store');
        Route::put('/cards/{card}', 'update')->name('cards.update');
        Route::delete('/cards/{card}', 'destroy')->name('cards.destroy');
    });
});


