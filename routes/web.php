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
Route::get('/status', 'AlreadyLogin@index')->name('home');
Route::get('/about', function() {return view('client.about'); })->name('about.index');
Route::get('/privacy-policy', function() {return view('privacy-policy'); })->name('privacy-policy');
Route::get('pdf', function() {
    $pdf = PDF::loadView('client.about_pdf');
    return $pdf->stream();
})->name('show_pdf');

// ADMIN
Route::prefix('admin')->middleware('auth')->group(function() {
    Route::get('/', 'Admin\AdminController@index')->name('admin.index');
    Route::get('/dashboard', 'Admin\DashboardController@index')->middleware('auth.admin')->name('admin.dashboard');
    Route::get('/profile/{user}', 'Admin\UserController@show')->name('user.profile');
    Route::get('/lastactivity', 'Admin\UserController@lastactivity');
    Route::get('/users/{user}/edit', 'Admin\UserController@edit')->name('users.edit');
    Route::post('/bulk/{operation}', 'Admin\BulkOperator@operate');
    Route::post('/post/{post}/comments', 'Admin\CommentController@store')->name('post.comment.store');
    Route::patch('/users/{user}', 'Admin\UserController@update')->name('users.update');
    Route::patch('/status/{user}', 'Admin\UserController@updateRole')->name('change.updateRole');
    Route::resource('comments', 'Admin\CommentController')->except(['store']);
    Route::resource('users', 'Admin\UserController')->except(['update']);
    Route::resources([
        'posts' =>  'Admin\PostController',
        'categories' => 'Admin\CategoryController',
    ]);
});

Auth::routes();

// LANGUAGE
Route::post('/lang/{lang}', 'LangController@lang');

// SOCIAL CONTROLLER
Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/complete', 'SocialController@index');
Route::post('/complete', 'SocialController@store')->name('complete.store');
Route::get('/callback/{provider}', 'SocialController@callback');



