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

Route::get('/', 'HomeController@index');


Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/announcements', 'HomeController@index');
Route::get('/notifications', 'HomeController@notifications');
Route::get('/grades', 'HomeController@grades');

Route::get('/userview/{input}/', 'HomeController@viewusers');
Route::get('/grades/{input}/', 'HomeController@viewgrades');

Route::get('/activate/{input}', 'userActive@activate');
Route::get('/deactivate/{input}', 'userActive@deactivate');

Route::get('/announcements/{input}/', 'HomeController@update_announcement');
Route::get('/notifications/{input}/', 'HomeController@update_notification');
Route::get('/pendingannouncement', 'HomeController@pending_announcement');
Route::get('/pendingnotification', 'HomeController@pending_notification');
Route::get('/updatenotifications', 'HomeController@allnotifications');
Route::get('/approvednotifications', 'HomeController@allapprovednotifications');

Route::get('/viewgrades', function(){
   return view('viewgrades');
});

Route::get('/users', function(){
   return view('users');
});

Route::get('/createnotifications', function(){
   return view('createnotifications');
});

Route::get('/createannouncements', function(){
   return view('createannouncements');
});



Route::post('/viewgradeslist', 'HomeController@viewgradeslist');
Route::post('/viewuserslist', 'HomeController@viewuserslist');
Route::post('/submit', 'HomeController@submit');
Route::post('/update', 'HomeController@update');
Route::get('{anID}', 'HomeController@view_announcement');





