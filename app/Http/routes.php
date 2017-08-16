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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'Admin\IndexController@index');
Route::get('/info', ['as' => 'index.info' ,'uses' => 'Admin\IndexController@info']);

// category
Route::resource('category', 'Admin\CategoryController');
Route::post('/category/batchDel', ['as' => 'category.batchDel', 'uses' => 'Admin\CategoryController@batchDel']);

// article
Route::get('/article', 'Admin\ArticleController@getList');
Route::get('/article/create', 'Admin\ArticleController@create');
