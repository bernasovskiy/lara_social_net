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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::post('/friends/{user_id}/{other_id}', ['as' => 'create_friend', 'uses' => 'HomeController@create_friend']);

Route::delete('/remove_friend/{id}', ['as' => 'remove_friend', 'uses' => 'HomeController@remove_friend']);

Route::get('messages/from', ['as' => 'messages_from', 'uses' => 'MessagesController@messages_from']);

Route::get('messages/to', ['as' => 'messages_to', 'uses' => 'MessagesController@messages_to']);

Route::get('messages/new/{id}', ['as' => 'send_message', 'uses' => 'MessagesController@new_message']);

Route::post('messages/store/{id}', ['as' => 'submit_message', 'uses' => 'MessagesController@submit_message']);

Route::put('message/read/{id}', ['as' => 'read_message', 'uses' => 'MessagesController@read_message']);
