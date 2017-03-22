<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
|
 */

Route::post('user/login', 'UserController@login');
Route::resource('user', 'UserController', ['only' => ['store']]);

Route::group(['middleware' => ['api.auth']], function()
{
  Route::resource('user', 'UserController', ['only' => ['show']]);
});
