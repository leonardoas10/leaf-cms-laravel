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


// CLIENT
Route::get('/', 'Client\HomeController@index');
Route::post('/', 'Client\HomeController@index');
Route::get('/category/{category}', 'Client\HomeController@index')->name('category.index');
Route::get('/post/{post}', 'Client\HomeController@show')->name('post.show');
Route::get('/forgot', 'Client\ForgotController@index')->name('forgot.index');
Route::post('/forgot', 'Client\ForgotController@store')->name('forgot.store');
Route::get('/registration', 'Client\RegistrationController@index')->name('registration.index');
Route::post('/registration', 'Client\RegistrationController@store')->name('registration.store');

Route::get('/reset', 'Client\ResetController@index');

Route::resource('contact', 'Client\ContactController');
Route::resource('login', 'Client\LoginController');


// ADMIN
Route::prefix('admin')->group(function(){
    Route::get('/', 'Admin\AdminController@index')->name('admin.index');
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');
    Route::resource('posts', 'Admin\PostController');
    Route::resource('categories', 'Admin\CategoryController');
    Route::resource('comments', 'Admin\CommentController');
    Route::resource('users', 'Admin\UserController');
    Route::resource('profile', 'Admin\UserController');

    Route::get('/status/{status}', 'Admin\ChangeStatusController@updateRole')->name('change.updateRole');
});