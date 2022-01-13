<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
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

Route::get(
    '/',[HomeController::class, 'index']
)->middleware('auth');
// Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes([

    'register' => false, // Register Routes...

    'reset' => false, // Reset Password Routes...

    'verify' => false, // Email Verification Routes...

  ]);

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');
    Route::resource('blogs', 'BlogsController');
    Route::resource('categories', 'CategoriesController');
    Route::get('/home', [HomeController::class, 'index'])->name('home');


    // user
    Route::prefix('user')->group(
        function () {
            Route::get(
                '/data',
                [
                    'uses' => 'UserController@data',
                    'as' => 'user.data'
                ]
            );
            Route::get(
                '/',
                [
                    'uses' => 'UserController@index',
                    'as' => 'user.index'
                ]
            );
            Route::get(
                '/create',
                [
                    'uses' => 'UserController@create',
                    'as' => 'user.create'
                ]
            );
            Route::post(
                '/store',
                [
                    'uses' => 'UserController@store',
                    'as' => 'user.store'
                ]
            );
            Route::get(
                '/{id}/edit',
                [
                    'uses' => 'UserController@edit',
                    'as' => 'user.edit'
                ]
            );
            Route::post(
                '/update/{id}',
                [
                    'uses' => 'UserController@update',
                    'as' => 'user.update'
                ]
            );
            Route::get(
                '/editprofile',
                [
                    'uses' => 'UserController@editprofile',
                    'as' => 'user.editprofile'
                ]
            );
            Route::post(
                '/updateprofile/{id}',
                [
                    'uses' => 'UserController@proseseditprofile',
                    'as' => 'user.updateprofile'
                ]
            );
            Route::get(
                '/{id}/delete',
                [
                    'uses' => 'UserController@destroy',
                    'as' => 'user.destroy'
                ]
            );
        }
    );

    //role
    Route::prefix('role')->group(
        function () {
            Route::get(
                '/data',
                [
                    'uses' => 'RoleController@data',
                    'as' => 'role.data'
                ]
            );
            Route::get(
                '/',
                [
                    'uses' => 'RoleController@index',
                    'as' => 'role.index'
                ]
            );
            Route::get(
                '/create',
                [
                    'uses' => 'RoleController@create',
                    'as' => 'role.create'
                ]
            );
            Route::post(
                '/store',
                [
                    'uses' => 'RoleController@store',
                    'as' => 'role.store'
                ]
            );
            Route::get(
                '/{id}/edit',
                [
                    'uses' => 'RoleController@edit',
                    'as' => 'role.edit'
                ]
            );
            Route::post(
                '/update/{id}',
                [
                    'uses' => 'RoleController@update',
                    'as' => 'role.update'
                ]
            );


            Route::get(
                '/{id}/delete',
                [
                    'uses' => 'RoleController@destroy',
                    'as' => 'role.destroy'
                ]
            );
        }
    );

});


