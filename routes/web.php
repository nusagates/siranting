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
    return view('welcome');
});

Route::view('login', 'pages.login');
Route::view('register', 'pages.register');
Route::view('submission', 'pages.submission');
Route::view('administrative', 'pages.administrative');
Route::view('companies', 'pages.companies');
Route::view('mosque', 'pages.mosque');

