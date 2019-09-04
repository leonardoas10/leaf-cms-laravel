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
Route::resource('contact', 'Client\ContactController');

// ADMIN
Route::prefix('admin')->middleware('auth')->group(function(){
    Route::get('/', 'Admin\AdminController@index')->name('admin.index');
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');
    Route::post('/bulk/{operation}', 'Admin\BulkOperator@operate');
    Route::post('/post/{post}/comments', 'Admin\CommentController@store')->name('post.comment.store');
    Route::patch('/status/{user}', 'Admin\ChangeStatusController@updateRole')->name('change.updateRole');
    Route::resource('comments', 'Admin\CommentController')->except(['store']);
    Route::resources([
        'posts' =>  'Admin\PostController',
        'categories' => 'Admin\CategoryController',
        'users' => 'Admin\UserController',
    ]);
});

Auth::routes();

Route::get('/status', 'AlreadyLogin@index')->name('home');
