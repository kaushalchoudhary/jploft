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
Route::match(["get", "post"], "/login", "RegisterController@login")->name('login');
Route::match(["get", "post"], "/", "RegisterController@create")->name('create');
Route::get( "dashboard", "RegisterController@dashboard")->name('dashboard');
Route::get("verify/{token}", "RegisterController@verify")->name('verify');
Route::post('/checkemail',['uses'=>'RegisterController@checkEmail']);