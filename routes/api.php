<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'App\Http\Controllers\Person', 'prefix' => 'people'], function () {
    Route::get('/', 'IndexController')->name('api.people.index');
    Route::post('/', 'StoreController')->name('api.people.store');
    Route::patch('/{person}', 'UpdateController')->name('api.people.update');
    Route::delete('/{person}', 'DestroyController')->name('api.people.destroy');
    Route::get('/{person}/restore', 'RestoreController')->withTrashed()->name('api.people.restore');
});
