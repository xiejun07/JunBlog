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
Route::group(['namespace' => 'Admin'], function(){
    Route::get('/login', 'PermissionController@login');
    Route::get('/logout', 'PermissionController@logout');
    Route::post('/checkLogin', 'PermissionController@checkLogin');
});


Route::group(['middleware' => ['admin.login'], 'namespace' => 'Admin'], function(){
    // 首页
    Route::get('/', 'IndexController@index');
    Route::get('/info', ['as' => 'index.info' ,'uses' => 'IndexController@info']);
    Route::get('user/edit', ['as' => 'user.edit', 'uses' => 'PermissionController@editUser']);

    // category resource管理
    Route::resource('category', 'CategoryController');
    Route::post('/category/batchDel', ['as' => 'category.batchDel', 'uses' => 'CategoryController@batchDel']);

    // article  一条一条管理
    Route::get('/article', 'ArticleController@getList');
    Route::get('/article/create', 'ArticleController@create');
    Route::post('/article/uploadImg', 'ArticleController@uploadImgToLocal');
    Route::post('/article/store', 'ArticleController@store');
    Route::post('/article/delete', 'ArticleController@delete');
    Route::get('/article/{id}/edit', 'ArticleController@edit');
    Route::post('/article/{id}/update', 'ArticleController@update');
    Route::post('/article/batchDel', ['as' => 'article.batchDel', 'uses' => 'ArticleController@batchDel']);

    // 友情链接  resource管理
    Route::resource('/flink', 'FlinkController');
    Route::post('/flin/batchDel', ['as' => 'flink.batchDel', 'uses' => 'FlinkController@batchDel']);

    // 系统配置  resource管理
    Route::resource('conf', 'ConfigController');
    Route::post('/conf/batchDel', ['as' => 'config.batchDel', 'uses' => 'ConfigController@batchDel']);
    Route::post('/conf/bindValue', 'ConfigController@bindValue');
});

Route::get('/jun', 'Home\IndexController@index');
Route::get('/xie', 'Home\IndexController@article');

