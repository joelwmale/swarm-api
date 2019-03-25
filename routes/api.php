<?php

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

Route::group(['prefix' => 'swexporter'], function() {
    Route::get('accepted_commands', 'SWExporterController@acceptedCommands');

    Route::group(['middleware' => 'sw_token'], function() {
        Route::post('profile', 'SWExporterController@profile');
        Route::post('log', 'SWExporterController@log');
    });
});
