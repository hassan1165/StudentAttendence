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


//Route::namespace('Admin')->group(function () {
//    // Controllers Within The "App\Http\Controllers\Admin" Namespace
//});//
Route::prefix('admin')->namespace('Admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('users', 'UsersController', ['except' => ['show']]);
});

//Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
//    Route::resource('/admin/users', 'Admin\UserController', ['except' => ['show', 'create', 'store']]);
//});

//Route::resource('/admin/users','Admin\UsersController', ['except' => ['show','create','store']]);

//Route::group(['namespace' => 'Admin', 'prefix' => '/admin', 'name' => 'admin.', 'middleware' => 'can:manage-users'], function() {
//    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);
//});
