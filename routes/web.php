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

Auth::routes();
Route::group(['middleware' => ['admin']], function () {
    // Route Kelas
    Route::resource('levels', 'LevelsController');
    //Route User
    Route::resource('users', 'UsersController');
    //Route Student
    Route::resource('students', 'StudentsController');
    
    // Route Teacher 
    Route::resource('teachers', 'TeachersController');
    // route recap 
    Route::resource('recaps', 'RecapsController');
    Route::get('adminrecap', 'ReportsController@adminrecap');
    // export data reading 
    Route::get('exportadmin', 'AdminController@export');
    // export data omob 
    Route::post('export_excel', 'ReportsController@export_excel');
    // import data user 
    Route::post('/importUser', 'UsersController@import_excel');
    Route::get('/review/{id}','ReviewController@show')->name('review.show');
    Route::get('/review/{id}/print','ReviewController@printPdf')->name('review.print');
});

Route::group(['middleware' => ['student']], function () {
    // Route Buku
    Route::resource('books', 'BooksController');
    //Route Reading Post id
    Route::get('create/{id}', 'ReadingsController@create');
    // Route Reading
    Route::resource('readings', 'ReadingsController');

    // Route Tambah Kelas
    Route::post('tambahkelas', 'ReadingsController@tambahKelas');
    Route::resource('kelas', 'ClassController');
    // addroute save review 
    Route::post('savereview', 'ReadingsController@savereview');
    Route::get('review/{id}/edit','ReviewController@edit')->name('review.edit');
    Route::put('/review/{id}','ReviewController@update')->name('review.update');
});

Route::group(['middleware' => ['teacher']], function () {
    // Route Reports
    Route::resource('reports', 'ReportsController');
    Route::get('/recap', 'ReportsController@recap');
    Route::post('/rangking', 'ReportsController@rangking');
    Route::get('reports/detail/{id}/{kelas}', 'ReportsController@detail')->name('reports.detail');
    Route::get('exportrecap', 'ReportsController@export');
    Route::post('export_excel', 'ReportsController@export_excel');
    // Route::resource('review', 'ReviewController');
    Route::get('/review/{id}','ReviewController@show')->name('review.show');
    Route::get('/review/{id}/print','ReviewController@printPdf')->name('review.print');
});
Route::group(['middleware' => ['auth']], function () {
    Route::resource('review', 'ReviewController');
    Route::get('count','StudentController@countStudents')->name('students.count');
});
Route::get('/clear', function () {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});

//Route Home
Route::get('/home', 'HomeController@index')->name('home');
Route::get('count','StudentsController@countStudents')->name('students.count');