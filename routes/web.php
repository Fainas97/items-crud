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

Auth::routes();

Route::group(['prefix' => 'items', 'middleware' => ['auth']], function () {

    Route::get('/', 'ItemController@index')->name('home');

    Route::get('/create', 'ItemController@create')->name('item.create');
    Route::post('/create', 'ItemController@store')->name('item.store');

    Route::get('/{id}', 'ItemController@show')->name('item.show');

    Route::get('/{id}/edit', 'ItemController@edit')->name('item.edit');
    Route::put('/{id}/update', 'ItemController@update')->name('item.update');

    Route::delete('/{id}', 'ItemController@destroy')->name('item.destroy');

    Route::get('/category/show', 'ItemController@categoryIndex')->name('item.category');
});

Route::group(['prefix' => 'categories', 'middleware' => ['auth']], function () {

    Route::get('/', 'CategoryController@index')->name('cat.home');

    Route::get('/create', 'CategoryController@create')->name('cat.create');
    Route::post('/create', 'CategoryController@store')->name('cat.store');

    Route::get('/{id}', 'CategoryController@show')->name('cat.show');

    Route::get('/{id}/edit', 'CategoryController@edit')->name('cat.edit');
    Route::put('/{id}/update', 'CategoryController@update')->name('cat.update');

    Route::delete('/{id}', 'CategoryController@destroy')->name('cat.destroy');

    Route::get('/show/items', 'CategoryController@categories')->name('cat.items');
});

Route::get('/api/items/{id}', 'ItemController@api')->name('api');

Route::any('/{any}', function () {
    return redirect()->action('ItemController@index');
})->where('any', '.*');
