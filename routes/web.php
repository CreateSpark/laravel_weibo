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

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::get('/', 'StaticPagesController@home')->name('home');
Route::get('/help', 'StaticPagesController@help')->name('help');
Route::get('/about', 'StaticPagesController@about')->name('about');

Route::get('signup', 'UsersController@create')->name('signup');
/*
 * 注册路由时，URI signup 和 /signup 从使用上来看，并无区别，Laravel 框架兼容这两种写法。
 */


/*
Route::get('/users', 'UsersController@index')->name('users.index');
Route::get('/users/{user}', 'UsersController@show')->name('users.show');
Route::get('/users/create', 'UsersController@create')->name('users.create');
Route::post('/users', 'UsersController@store')->name('users.store');
Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');
Route::patch('/users/{user}', 'UsersController@update')->name('users.update');
Route::delete('/users/{user}', 'UsersController@destroy')->name('users.destroy');*/


Route::resource('users', 'UsersController');

Route::get('login', 'SessionsController@create')->name('login');
Route::post('login', 'SessionsController@store')->name('login');
Route::delete('logout', 'SessionsController@destroy')->name('logout');

Route::get('signup/confirm/{token}', 'UsersController@confirmEmail')->name('confirm_email');


Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

Route::resource('statuses', 'StatusesController', ['only' => ['store', 'destroy']]);

Route::get('/users/{user}/followings', 'UsersController@followings')->name('users.followings');
Route::get('/users/{user}/followers', 'UsersController@followers')->name('users.followers');

Route::post('/users/followers/{user}', 'FollowersController@store')->name('followers.store');
Route::delete('/users/followers/{user}', 'FollowersController@destroy')->name('followers.destroy');

Route::group(['middleware' => ['web']], function () {
    Route::any('session1', ['uses' => 'PracticeController@session1']);
    Route::any('session2', ['uses' => 'PracticeController@session2']);
});

//中间件
Route::any('activity0', ['uses' => 'PracticeController@activity0']);//宣传页面

Route::group(['middleware' => ['web']], function () { //活动页面
    //练习
    Route::get('/practice', 'PracticeController@formPractice')->name('practice.formPractice');
    Route::get('/practice/create', 'PracticeController@Create')->name('practice.student.create');
    Route::any('/practice/save', 'PracticeController@Save')->name('practice.student.save');
});

Route::get('/PracticeJs', 'PracticeController@PracticeJs')->name('PracticeJs');

Route::view('/js_1', 'practice/aboutJs/');

