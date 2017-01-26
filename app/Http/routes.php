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
//Route::post ('/check', function (Request $request)
//    {
//
//        $IDno = $_POST['IDno'];
//        $password = $_POST['password'];
//
//        if (Auth::attempt(['IDno' => $IDno, 'password' => $password, 'is_active' => 1])) {
//            return redirect()->intended('/home');
//        }
//
//        return redirect('/');
//    });
Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/prompt', function() {
    return view('auth.prompt');
});

//announcements
Route::get('/announcements', 'HomeController@announcements');
Route::get('/announcements/{input}/', 'HomeController@update_announcement');
Route::get('/approved/announcements/{input}/', 'HomeController@approved_announcement');
Route::get('/pending/announcements', 'HomeController@pending_announcement');
Route::get('/create/announcements', function() {
    return view('createannouncements');
});
Route::get('/delete/announcements/{input}', 'HomeController@delete_announcement');

//notifications
Route::get('/notifications', 'HomeController@notifications');
Route::get('/notifications/{input}/', 'HomeController@update_notification');
Route::get('/approved/notifications/{input}/', 'HomeController@approved_notification');
Route::get('/pending/notifications', 'HomeController@pending_notification');
Route::get('/view/notifications', 'HomeController@allnotifications');
Route::get('/approved/notifications', 'HomeController@allapprovednotifications');
Route::get('/create/notifications', function() {
    return view('createnotifications');
});
Route::get('/delete/notifications/{input}', 'HomeController@delete_notification');

//grades
Route::get('/grades', 'HomeController@grades');
Route::get('/grades/{input}/', 'HomeController@viewgrades');
Route::get('/view/grades', function() {
    return view('viewgrades');
});
Route::post('/list/view/grades', 'HomeController@viewgradeslist');
Route::get('/modify/grades/{input}', 'HomeController@modifyGrades');
Route::post('/confirm/modify', 'HomeController@confirmModifyGrades');
Route::post('/add/grades', 'HomeController@addGrades');
//lock grades
Route::post('/unlock', 'HomeController@unlockGrades');
Route::post('/lock', 'HomeController@lockGrades');
Route::post('/delete', 'HomeController@deleteGrades');
Route::get('/all/unlock', 'HomeController@allUnlockGrades');


//users
Route::post('/mod/user', 'HomeController@modifyuser');
Route::post('/users/list', 'HomeController@viewuserslist');
Route::get('/users/{input}', 'HomeController@viewusers');
Route::get('/modify/users/{input}', 'HomeController@modusers');

//others
Route::get('/activate/{input}', 'userActive@activate');
Route::get('/deactivate/{input}', 'userActive@deactivate');
Route::get('/users', function() {
    return view('users');
});

Route::post('/submit', 'HomeController@submit');
Route::post('/update', 'HomeController@update');
Route::get('{anID}', 'HomeController@view_announcement');