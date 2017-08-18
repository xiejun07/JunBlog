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

// category resource管理
Route::resource('category', 'Admin\CategoryController');
Route::post('/category/batchDel', ['as' => 'category.batchDel', 'uses' => 'Admin\CategoryController@batchDel']);

// article  一条一条管理
Route::get('/article', 'Admin\ArticleController@getList');
Route::get('/article/create', 'Admin\ArticleController@create');
Route::post('/article/uploadImg', 'Admin\ArticleController@uploadImgToLocal');
Route::post('/article/store', 'Admin\ArticleController@store');
Route::post('/article/delete', 'Admin\ArticleController@delete');
Route::get('/article/{id}/edit', 'Admin\ArticleController@edit');
Route::post('/article/{id}/update', 'Admin\ArticleController@update');
Route::post('/article/batchDel', ['as' => 'article.batchDel', 'uses' => 'Admin\ArticleController@batchDel']);
