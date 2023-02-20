<?php

use Illuminate\Support\Facades\Route;
use App\Controllers\LoginController;
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

Route::get('/home', function () {
    return View::make('index');
   });


Route::get('/logins', function () {
    return View::make('login');
   });




Route::post('signin', [
    'uses' => 'LoginController@postSignin',
    'as' => 'user.signin',
]);



// STUDENT 

Route::get('signup', [
    'uses' => 'StudentController@getSignup',
    'as' => 'user.signups',
        ]);

Route::post('/signups', [
    'uses' => 'StudentController@postSignup',
    'as' => 'user.signup',
]);


Route::get('profile', [
    'uses' => 'StudentController@getProfile',
    'as' => 'user.profile',
]);


Route::get('/student/{id}/edit', [
    'uses' => 'StudentController@edit',
    'as' => 'user.edit',
]);

Route::put('/student/{id}', 'StudentController@update')->name('user.update');

Route::get('login', [
    'uses' => 'StudentController@getSignin',
    'as' => 'user.signins',
 ]);

 
// EMPLOYEE
Route::get('esignup', [
    'uses' => 'EmployeeController@getSignup',
    'as' => 'employee.signups',
        ]);

Route::post('/esignups', [
    'uses' => 'EmployeeController@postSignup',
    'as' => 'employee.signup',
]);


Route::get('eprofile', [
    'uses' => 'EmployeeController@getProfile',
    'as' => 'employee.profile',
]);


Route::get('/employee/{id}/edit', [
    'uses' => 'EmployeeController@edit',
    'as' => 'employee.edit',
]);

Route::put('/employee/{id}', 'EmployeeController@update')->name('employee.update');

Route::get('elogin', [
    'uses' => 'EmployeeController@getSignin',
    'as' => 'employee.signins',
 ]);


//LOGOUT
Route::get('logout',[
    'uses' => 'LoginController@logout',
    'as' => 'user.logout',
   ]); 