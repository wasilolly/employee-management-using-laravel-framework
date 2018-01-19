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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/employees/bin', 'EmployeeController@bin')->name('employees.bin');
Route::get('/employees/restore/{id}', 'EmployeeController@restore')->name('employees.restore');
Route::get('/employees/kill/{id}', 'EmployeeController@kill')->name('employees.kill');

Route::get('/users', 'UserController@index')->name('users');
Route::get('/users/activate/{id}', 'UserController@activate')->name('users.activate');
Route::get('/users/deactivate/{id}', 'UserController@deactivate')->name('users.deactivate');
Route::get('/users/admin/{id}', 'UserController@admin')->name('users.admin');
Route::get('/users/notadmin/{id}', 'UserController@notAdmin')->name('users.notAdmin');

Route::get('/employees/download/{id}','EmployeeController@downloadPDF')->name('employees.download');

Route::resources([
		'employees'=> 'EmployeeController',
		'roles'=> 'RoleController',
		'departments' => 'DepartmentController'
	]);