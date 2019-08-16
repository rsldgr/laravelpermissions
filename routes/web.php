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

Route::get('/home', 'HomeController@index')->name('home');



Route::namespace('Admin')->group(function () {
    Route::middleware(["auth","can:is_admin","can:is_banned"])->prefix('admin')->name('admin.')->group(function () {
    
        Route::get('/ilk', function () {
            return route('admin.index');
        })->name("index");
        Route::get('/home', 'AdminController@index')->name('home');

        
        
        Route::prefix('users')->name('users.')->group(function () {
            Route::get('/', 'UserController@index')->name('lists');
            Route::get('/add', 'UserController@create')->name('create');
            Route::post('/add', 'UserController@index')->name('store');

            Route::get('/edit/{user}', 'UserController@edit')->name('edit');
            Route::post('/edit/{user}', 'UserController@update')->name('update');

            Route::delete('/{user}', 'UserController@index')->name('delete');
        });


        Route::prefix('permissions')->name('permissions.')->group(function () {
            Route::get('/', 'AdminController@index')->name('lists');
            Route::get('/add', 'AdminController@index')->name('create');
            Route::post('/add', 'AdminController@index')->name('store');

            Route::get('/edit/{Permission}', 'AdminController@index')->name('edit');
            Route::post('/edit/{Permission}', 'AdminController@index')->name('update');

            Route::delete('/{Permission}', 'AdminController@index')->name('delete');
        });


        Route::prefix('roles')->name('roles.')->group(function () {
            Route::get('/', 'AdminController@index')->name('lists');
            Route::get('/add', 'AdminController@index')->name('create');
            Route::post('/add', 'AdminController@index')->name('store');

            Route::get('/edit/{Role}', 'AdminController@index')->name('edit');
            Route::post('/edit/{Role}', 'AdminController@index')->name('update');

            Route::delete('/{Role}', 'AdminController@index')->name('delete');
        });
        
    });
});





