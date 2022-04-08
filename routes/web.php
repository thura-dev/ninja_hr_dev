<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Auth::routes();
Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');


Route::middleware('auth')->group(function(){
  Route::get('/','PageController@home');

  Route::resource('employee','EmployeeController');
  Route::get('/employee/datatable/ssd','EmployeeController@ssd');
//   Route::get('/employee/datatable/ssd','EmployeeController@hello');
});
