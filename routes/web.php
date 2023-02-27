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


// Route::get('/scholarshipdashboard', function () {
//     return View::make('scholarship.index');
//    });



Route::post('signin', [
    'uses' => 'LoginController@postSignin',
    'as' => 'user.signin',
]);


// Route::get('/students', function () {
//     return View::make('user.users');
//    });

//DATATABLES

// Route::get('/students', [
//     'uses' => 'StudentController@getStudents',
//     'as' => 'getStudents'
//   ]);

//   Route::get('/employees', [
//     'uses' => 'EmployeeController@getEmployees',
//     'as' => 'getEmployees'
//   ]);





// STUDENT 

Route::get('signup', [
    'uses' => 'StudentController@getSignup',
    'as' => 'user.signups',
        ]);

Route::post('/signups', [
    'uses' => 'StudentController@postSignup',
    'as' => 'user.signup',
]);

Route::group(['middleware' => 'role:student'], function() {
    Route::get('profile', [
        'uses' => 'StudentController@getProfile',
        'as' => 'user.profile',
    ]);


    Route::get('/student/{id}/edit', [
        'uses' => 'StudentController@edit',
        'as' => 'user.edit',
    ]);
    
    Route::put('/student/{id}', 'StudentController@update')->name('user.update');

    Route::get('/scholarshipdashboard', [
        'uses' => 'ScholarshipController@getScholars',
         'as' => 'scholarship.index'
      ]);
    


});

 
// EMPLOYEE
Route::get('esignup', [
    'uses' => 'EmployeeController@getSignup',
    'as' => 'employee.signups',
        ]);

Route::post('/esignups', [
    'uses' => 'EmployeeController@postSignup',
    'as' => 'employee.signup',
]);

Route::group(['middleware' => 'role:employee'], function() {
    Route::get('eprofile', [
        'uses' => 'EmployeeController@getProfile',
        'as' => 'employee.profile',
    ]);


    Route::get('/employee/{id}/edit', [
        'uses' => 'EmployeeController@edit',
        'as' => 'employee.edit',
    ]);

    Route::put('/employee/{id}', 'EmployeeController@update')->name('employee.update');



    Route::delete('/employee/delete/{id}','EmployeeController@destroy')->name('employee.destroy');
    Route::get('/employee/restore/{id}','EmployeeController@restore')->name('employee.restore');

    Route::delete('/student/delete/{id}','StudentController@destroy')->name('user.destroy');
    Route::get('/student/restore/{id}','StudentController@restore')->name('user.restore');

    //DATATABLES

    Route::get('/students', [
        'uses' => 'StudentController@getStudents',
        'as' => 'getStudents'
    ]);

    Route::get('/employees', [
        'uses' => 'EmployeeController@getEmployees',
        'as' => 'getEmployees'
    ]);

    //SCHOLARSHIP DETAILS

   Route::get('/scholarship', [
    'uses' => 'ScholarshipController@create',
    'as' => 'scholarship.create',
        ]);

    Route::post('/scholarship', [
        'uses' => 'ScholarshipController@store',
        'as' => 'scholarship.store',
    ]);

    Route::get('/scholarships', [
        'uses' => 'ScholarshipController@getalltypes',
        'as' => 'getalltypes'
    ]);
    Route::put('/scholarship/{id}', 'ScholarshipController@update')->name('scholarship.update');
    Route::delete('/scholarship/delete/{id}','ScholarshipController@destroy')->name('scholarship.destroy');
    Route::get('/scholarship/restore/{id}','ScholarshipController@restore')->name('scholarship.restore');


    
});

//LOGOUT
Route::get('logout',[
    'uses' => 'LoginController@logout',
    'as' => 'user.logout',
   ]); 


