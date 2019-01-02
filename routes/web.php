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
    Route::post('/comments/{id}/delete', 'AdminController@deleteComments')->name('adminDeleteComments');
    Route::get('/posts', 'AdminController@posts')->name('adminPosts');
    Route::get('/users', 'AdminController@users')->name('adminUsers');
    Route::get('/users/{id}/edit','AdminController@editUser')->name('editUsers');
    Route::post('/users/{id}/edit','AdminController@postEditUser')->name('postEditUser');
    Route::post('/users/{id}/delete','AdminController@deleteUser')->name('adminDeleteUser');
    Route::get('/posts/{id}/edit','AdminController@adminEditPost')->name('adminEditPost');
    Route::post('/posts/{id}/edit','AdminController@adminPostEditPost')->name('adminPostEditPost');
    Route::post('/posts/{id}/delete','AdminController@adminDeletePost')->name('adminDeletePost');
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
    Route::get('/posts/new', 'AuthorController@newPost')->name('newPost');
    Route::post('/posts/new', 'AuthorController@createNewPost')->name('createNewPost');
    Route::get('/posts/{id}/edit','AuthorController@editPost')->name('editPost');
    Route::post('/posts/{id}/edit','AuthorController@postEditPost')->name('postEditPost');
    Route::post('/posts/{id}/delete','AuthorController@postDeletePost')->name('postDeletePost');
    
});



