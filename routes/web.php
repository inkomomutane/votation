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

Auth::routes();


Route::group(['as'=>'admin.', 'prefix' => 'admin','namespace'=>'admin','middleware'=>['auth','admin']], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::post('/dashboard/', 'DashboardController@store')->name('store');
    Route::get('/dashboard/js', 'DashboardController@jsonCreate')->name('jsonCreate');
    Route::put('/dashboard/{candidate}', 'DashboardController@update')->name('update');
    Route::delete('/dashboard/{candidate}', 'DashboardController@destroy')->name('delete');
    
});
Route::group(['as'=>'voter.', 'prefix' => 'voter','namespace'=>'voter','middleware'=>['auth','voter',]], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::post('/dashboard', 'DashboardController@store')->name('store');
    Route::put('/dashboard/{user}/{candidate}', 'DashboardController@update')->name('update');
    Route::delete('/dashboard/{candidate}', 'DashboardController@destroy')->name('delete');
     
});
Route::get('/dashboard/results','HomeController@index')->name('resultados')->middleware('auth');