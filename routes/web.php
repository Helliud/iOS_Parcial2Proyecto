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

Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/admin', 'InsectosApiController@index')->name('insectos.index');
Route::get('/insectos/{id}', 'InsectosApiController@show')->name('insectos.show');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
Auth::routes(['register' => false]);


