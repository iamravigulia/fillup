<?php
use Illuminate\Support\Facades\Route;

// Route::get('greeting', function () {
//     return 'Hi, this is your awesome package!';
// });

// Route::get('test', 'EdgeWizz\Fillup\Controllers\FillupController@test')->name('test');

Route::post('fmt/fillup/store', 'EdgeWizz\Fillup\Controllers\FillupController@store')->name('fmt.fillup.store');

Route::post('fmt/fillup/update{id}', 'EdgeWizz\Fillup\Controllers\FillupController@update')->name('fmt.fillup.update');

Route::post('fmt/fillup/uploadFile', 'EdgeWizz\Fillup\Controllers\FillupController@uploadFile')->name('fmt.fillup.csv');

Route::any('fmt/fillup/delete/{id}', 'EdgeWizz\Fillup\Controllers\FillupController@delete')->name('fmt.fillup.delete');

Route::any('fmt/fillup/inactive/{id}',  'EdgeWizz\Fillup\Controllers\FillupController@inactive')->name('fmt.fillup.inactive');
Route::any('fmt/fillup/active/{id}',  'EdgeWizz\Fillup\Controllers\FillupController@active')->name('fmt.fillup.active');
