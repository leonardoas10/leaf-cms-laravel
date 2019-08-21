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
Route::get('/category/{category}', 'Client\HomeController@index')->name('category.index');
Route::get('/post/{post}', 'Client\HomeController@show')->name('post.show');
Route::post('/', 'Client\HomeController@index');

Route::get('/forgot', 'Client\ForgotController@index');
Route::post('/forgot', 'Client\ForgotController@store');

Route::get('/reset', 'Client\ResetController@index');

Route::resource('contact', 'Client\ContactController');
Route::resource('login', 'Client\LoginController');
Route::resource('registration', 'Client\RegistrationController');

// ADMIN
Route::prefix('admin')->group(function(){
    Route::get('/', 'Admin\AdminController@index')->name('admin.index');
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');
    Route::resource('posts', 'Admin\PostController');
    Route::resource('categories', 'Admin\CategoryController');
    Route::resource('comments', 'Admin\CommentController');
    Route::resource('users', 'Admin\UserController');
    Route::resource('profile', 'Admin\UserController');
});