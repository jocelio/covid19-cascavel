<?php

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


Route::get('/', 'HomeController@index');

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/report', 'DailyReportController@index')->name('report');
    Route::get('/report/create', 'DailyReportController@create')->name('report');
    Route::post('/report/insert', 'DailyReportController@insert');
    Route::delete('/report/{report}', 'DailyReportController@delete');

});
