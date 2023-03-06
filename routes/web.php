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

//DOCUMENT SAMPLE
Route::get('docudocu', [
    'uses' => 'DocumentController@showall',
    'as' => 'document.showall',
        ]);

        Route::get('viewgrades/{id}', [
            'uses' => 'DocumentController@viewgrades',
            'as' => 'document.viewgrades',
                ]);

                Route::get('viewcor/{id}', [
                    'uses' => 'DocumentController@viewcor',
                    'as' => 'document.viewcor',
                        ]);              
               

Route::get('docu', [
    'uses' => 'DocumentController@getcreate',
    'as' => 'document.create',
        ]);

Route::post('/docs', [
    'uses' => 'DocumentController@store',
    'as' => 'document.store',
]);

//TRANSACTION

Route::get('transaction', [
    'uses' => 'TransactionController@getcreate',
    'as' => 'transaction.create',
        ]);


 Route::post('/transactions', [
            'uses' => 'TransactionController@store',
            'as' => 'transaction.store',
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

    //ACADEMIC SCHOOL YEAR

    Route::get('/academicyear', [
        'uses' => 'AcademicYearController@create',
        'as' => 'academicyear.create',
            ]);
    
        Route::post('/academicyear', [
            'uses' => 'AcademicYearController@store',
            'as' => 'academicyear.store',
        ]);
    
        Route::get('/academicyears', [
            'uses' => 'AcademicYearController@getallyears',
            'as' => 'getallyears'
        ]);

        Route::put('/academicyear/{id}', 'AcademicYearController@update')->name('academicyear.update');
        Route::delete('/academicyear/delete/{id}','AcademicYearController@destroy')->name('academicyear.destroy');
        Route::get('/academicyear/restore/{id}','AcademicYearController@restore')->name('academicyear.restore');




        //APPLICATION PERIOD

        Route::get('/applicationperiods', [
            'uses' => 'ApplicationPeriodController@getallappliperiods',
            'as' => 'getallappliperiods'
        ]);

        Route::post('/applicationperiod', [
            'uses' => 'ApplicationPeriodController@store',
            'as' => 'applicationperiod.store',
        ]);

        Route::put('/applicationperiod/{id}', 'ApplicationPeriodController@update')->name('applicationperiod.update');
        Route::delete('/applicationperiod/delete/{id}','ApplicationPeriodController@destroy')->name('applicationperiod.destroy');
        Route::get('/applicationperiod/restore/{id}','ApplicationPeriodController@restore')->name('applicationperiod.restore');


    
});

//LOGOUT
Route::get('logout',[
    'uses' => 'LoginController@logout',
    'as' => 'user.logout',
   ]); 


