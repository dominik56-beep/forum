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

Route::get('/', 'App\Http\Controllers\Forum\Controller@forum');

Route::group([
    'namespace' => 'App\Http\Controllers\Forum',
    'prefix' => 'topic'
], function() {
    Route::get('{id}/get', 'Topic@get')->name('topic.get');

    Route::get('{id}/edit', 'Topic@edit')->name('topic.edit');

    Route::post('update', 'Topic@update')->name('topic.update');
});


