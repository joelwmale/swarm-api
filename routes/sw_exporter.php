<?php

Route::get('accepted_commands', 'SWExporterController@acceptedCommands');

Route::group(['middleware' => 'sw_token'], function () {
    Route::post('profile', 'SWExporterController@profile');
    Route::post('log', 'SWExporterController@log');
});
