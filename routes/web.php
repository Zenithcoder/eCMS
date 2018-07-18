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

Route::resource('company', 'CompanyController');
Route::resource('employee', 'EmployeeController');

Route::get('/companys/{id}', 'CompanyController@details')->name('company.details');
Route::get('/companydelete/{id}', 'CompanyController@delete')->name('company.delete');
Route::get('/employees/{id}', 'EmployeeController@details')->name('employee.details');
Route::get('/employeedelete/{id}', 'EmployeeController@delete')->name('employee.delete');
