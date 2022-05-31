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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/edit', function () {
//     return view('edit');
// });

// Route::get('/register', function () {
//     return view('register');
// });

//Register --/  Login --/
Route::group(['middleware' => 'web'], function () {
    Route::get('/register', 'App\Http\Controllers\UserController@getRegister')->name('register');
    Route::post('/register', 'App\Http\Controllers\UserController@postRegister')->name('register');
    Route::get('login', [
        'as' => 'login',
        'uses' => 'App\Http\Controllers\UserController@getLogin'
    ]);
    Route::post('/login', [
        'uses' => 'App\Http\Controllers\UserController@postLogin',
        'as' => 'login'
    ]);
});

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/managers', 'App\Http\Controllers\ManageController@index')->name('managers');
    // Route::get('/search', 'App\Http\Controllers\ManageController@search')->name('managers.search');
    Route::get('user/{id}', 'App\Http\Controllers\ManageController@destroy')->name('users.destroy');

    // Route::get('users/{user}', 'App\Http\Controllers\ManageController@edit')->name('users.edit');
    // Route::patch('users/{id}/update', 'App\Http\Controllers\ManageController@update')->name('users.update');
});
