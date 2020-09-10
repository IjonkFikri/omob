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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix' => 'books'], function () {
    Route::get('', 'BooksController@index')->name('books');
});
Route::group(['prefix' => 'class'], function () {
    Route::get('', 'ClassController@index')->name('clas');
    Route::get('/create', 'ClassController@create')->name('class.create');
    Route::post('', 'ClassController@store')->name('class.store');
    Route::get('/{id}/edit', 'ClassController@edit')->name('class.edit');
    Route::put('/{class}', 'ClassController@update')->name('class.update');
    Route::delete('/{class}', 'ClassController@destroy')->name('class.destroy');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
