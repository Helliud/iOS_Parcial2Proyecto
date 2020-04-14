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

Route::get('/index', 'InsectosApiController@index')->name('insectos.index');
Route::resource('/admin/insectos','InsectosApiController');


Route::get('/admin/index', 'UsuariosController@index')->name('admin.index');
Route::resource('/admin','UsuariosController');


Route::get('/home', 'HomeController@index')->name('home');
Auth::routes(['register' => false]);


