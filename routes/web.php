<?php

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

Auth::routes(['verify' => true]);


Route::group(['as'=>'admin.', 'prefix' => 'admin','namespace'=>'admin','middleware'=>['auth','admin','verified']], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});
Route::group(['as'=>'voter.', 'prefix' => 'voter','namespace'=>'voter','middleware'=>['auth','voter','verified']], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});