<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/* Login Routes */
Route::get('auth/login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

/* Registeration Routes */
Route::get('auth/register', ['as' => 'register', 'uses' => 'Auth\AuthController@getRegister']);
Route::post('auth/register', 'Auth\AuthController@postRegister');

/* Profile Routes */
Route::get('profile', ['as' => 'profile', 'uses' => 'ProfileController@showProfile']);
Route::post('profile', ['as' => 'profile', 'uses' => 'ProfileController@updateProfile']);

/* Categories Routes */
Route::resource('categories', 'CategoriesController', ['except' => ['create']]);

/* Tags Routes */
Route::resource('tags', 'TagsController', ['except' => ['create']]);

/* Blog Routes */
Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');
Route::get('blog', ['as' => 'blog.index', 'uses' => 'BlogController@getIndex']);

/* Pages Routes */
Route::get('/', 'PagesController@getIndex');
Route::get('/about', 'PagesController@getAbout');
Route::get('/contact', 'PagesController@getContact');

/* Posts Routes */
Route::resource('posts', 'PostsController');

/* Comments Routes */
Route::post('comments/{post_id}', ['as'=>'comments.store', 'uses' => 'CommentsController@store']);