<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('register', 'Auth\RegisterController@store');

// Password Reset Routes...
//$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//$this->post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index')->name('home');


//TUTEE
Route::resource('tutee', 'Tutee\TuteeController')->only(['index', 'show']);



//USER
Route::resource('users', 'User\UserController')->except(['destroy']);
Route::resource('users.tutee', 'User\UserTuteeController')->except(['index']);
Route::resource('users.tutee.session', 'User\UserTuteeSessionController')->except(['index']);
Route::get('/users/{user}/changepassword', 'User\UserController@changePassword')->name('users.changepassword');
Route::post('/users/{user}/updatepassword', 'User\UserController@updatePassword')->name('users.updatepassword');


//SUBJECT
Route::resource('subject', 'Subject\SubjectController')->except(['show']);




//API ROUTES
//Route::resource('api/user', 'Api\User\UserController')->only(['index']);