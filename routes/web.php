<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

//
Route::auth();

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index');

Route::get('/adminPanel', 'AdminController@index')->name('adminPanel');
Route::get('/allUsers', 'AdminController@allUsers')->name('allUsers');
Route::post('/allUsers', 'AdminController@setPosition')->name('setPosition');

Route::get('/stripe', 'SaleController@stripe')->name('stripe');
Route::post('/purchases', 'SaleController@store')->name('purchases');

Route::get('/allCompanies', 'CompanyController@all')->name('allCompanies');

Route::get('/createCompany', 'CompanyController@create')->name('createCompany');
Route::post('/storeCompany', 'CompanyController@store')->name('storeCompany');

Route::get('/editCompany/{id}', 'CompanyController@edit')->name('editCompany');
Route::post('/updateCompanyName', 'CompanyController@updateName')->name('updateCompanyName');
Route::post('/updateCompanyLogo', 'CompanyController@updateLogo')->name('updateCompanyLogo');

Route::delete('/deleteCompany/{id}', 'CompanyController@delete')->name('deleteCompany');

Route::get('/allProducts', 'ProductController@all')->name('allProducts');
Route::get('/createProduct', 'ProductController@create')->name('createProduct');
Route::post('/storeProduct', 'ProductController@store')->name('storeProduct');

Route::get('/vue', 'VueController@index')->name('vue.index');
