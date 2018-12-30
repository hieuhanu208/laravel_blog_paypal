<?php


Route::get('/', 'PublicController@index')->name('index');
Route::get('posts/{id}', 'PublicController@singlePost')->name('postSingle');
Route::get('about', 'PublicController@about')->name('about');
Route::get('contact', 'PublicController@contact')->name('contact');

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Auth::routes();

Route::group(['prefix' => 'admin'], function () {

    Route::get('/dashboard', 'AdminController@dashboard')->name('adminDashboard');
    Route::get('/comments', 'AdminController@comments')->name('adminComments');
    Route::get('/posts', 'AdminController@posts')->name('adminPosts');
    Route::get('/users', 'AdminController@users')->name('adminUsers');
});

Route::group(['prefix' => 'user'], function () {
    Route::get('/dashboard', 'UserController@dashboard')->name('userDashboard');
    Route::get('/comments', 'UserController@comments')->name('userComments');
    Route::post('/comments/{id}/delete', 'UserController@deleteComments')->name('deleteComments');
    Route::get('profile', 'UserController@profile')->name('userProfile');
    Route::post('profile', 'UserController@postprofile')->name('postUserProfile');


   
});

Route::group(['prefix' => 'author'], function () {
    Route::get('/dashboard', 'AuthorController@dashboard')->name('authorDashboard');
    Route::get('/comments', 'AuthorController@comments')->name('authorComments');
    Route::get('/posts', 'AuthorController@posts')->name('authorPosts');
});



