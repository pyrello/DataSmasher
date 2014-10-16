<?php

/**
 * Data Importing routes
 */
Route::get('imports/{imports}/status', [
    'as' => 'admin.data.imports.status',
    'uses' => 'App\\Http\\Controllers\\Admin\\ImportsController@status',
]);

Route::post('imports/{imports}/extract', [
    'as' => 'admin.data.imports.extract',
    'uses' => 'App\\Http\\Controllers\\Admin\\ImportsController@extract',
]);

Route::resource('imports', 'App\\Http\\Controllers\\Admin\\ImportsController');