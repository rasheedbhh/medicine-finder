<?php

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
    return view('index');
});

Route::group(['middleware' => ['auth']], function() { 
    Route::get('/dashboard', 'LoginController@index')->name('dashboard');
});


Route::group(['middleware' => 'auth'], function() {
    Route::group(['middleware' => 'role:user', 'prefix' => 'user'], function() {
     Route::get('home','UserController@index')->name('user.home');
     Route::get('getPharmacist/{id}','UserController@getPharmacist');
     Route::get('search','UserController@search');
     Route::get('getMedicine/{id}','UserController@getMedicine');
     Route::post('order','UserController@orderMedicine')->name('user.order');
     Route::get('searchMedicine/{name}','UserController@searchMedicine');
     Route::get('history/{id}', 'UserController@history');
     Route::get('myOrders/{id}', 'UserController@myOrders');
     Route::get('delete/order/{id}','UserController@deleteOrder');
    });
   Route::group(['middleware' => 'role:pharmacist', 'prefix' => 'pharmacist'], function() {
/*     Route::get('home', 'PharmacistController@index')->name('pharmacist.home'); */
    Route::get('add/medicine', 'PharmacistController@addMedicine')->name('addMedicine');
    Route::post('add/medicine', 'PharmacistController@insertMedicine')->name('insertMedicine');
    Route::get('all/medicine/{id}', 'PharmacistController@getMedicine')->name('myMedicine');
    Route::get('edit/medicine/{id}', 'PharmacistController@editMedicine');
    Route::post('update/medicine/{id}', 'PharmacistController@updateMedicine');
    Route::get('delete/medicine/{id}', 'PharmacistController@deleteMedicine');
    Route::get('all/orders', 'PharmacistController@myOrders')->name('myOrders');
   });
    Route::group(['middleware' => 'role:admin', 'prefix' => 'admin'], function() {
        Route::get('/home', 'AdminController@index')->name('admin.home');
        Route::get('add/users', 'AdminController@addUser')->name('addUser');
        Route::post('add/users', 'AdminController@insertUser')->name('insertUser');
        Route::get('all/users', 'AdminController@allUsers')->name('allUsers');
        Route::get('edit/user/{id}', 'AdminController@editUser');
        Route::post('update/user/{id}', 'AdminController@updateUser');
        Route::get('delete/user/{id}', 'AdminController@deleteUser');

        Route::get('add/pharmacist', 'AdminController@addPharmacist')->name('addPharmacist');
        Route::post('add/pharmacist', 'AdminController@insertPharmacist')->name('insertPharmacist');
        Route::get('all/pharmacists', 'AdminController@allPharmacists')->name('allPharmacists');
        Route::get('edit/pharmacist/{id}', 'AdminController@editPharmacist');
        Route::post('update/pharmacist/{id}', 'AdminController@updatePharmacist');
        Route::get('delete/pharmacist/{id}', 'AdminController@deletePharmacist');

        Route::get('all/medicines', 'AdminController@allMedicines')->name('allMedicines');

        Route::get('all/orders', 'AdminController@allOrders')->name('allOrders');
    
    });
});