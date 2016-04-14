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
Route::group(['middleware' => ['web']], function () {
    Route::get('comment', ['as' => 'comment.index', 'uses' => 'CommentsController@index']);
    Route::post('comment', ['as' => 'comment.store', 'uses' => 'CommentsController@store']);
    Route::get('comment/delete', ['as' => 'comment.delete', 'uses' => 'CommentsController@delete']);
});
Route::get('excel', ['as' => 'excel.index', 'uses' => 'ExcelsController@index']);
