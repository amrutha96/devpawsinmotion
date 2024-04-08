<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\AppointmentsController;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
    Route::get('/register_dogs', 'register_dogs')->name('register_dogs');
    Route::post('/add_dogs', 'add_dogs')->name('add_dogs');
});

Route::controller(AppointmentsController::class)->group(function(){
    Route::get('/book_appointment', 'book_appointment')->name('book_appointment');
});
    
    // Route::get('/', function () {
    //     return view('\home\homepage');
    // });

    // Route::get('/login', function () {
    //     return view('\home\login');
    // });

    // Route::post('/login', 'App\Http\Controllers\AuthController@login')->name('login');

    // Route::get('/register', 'App\Http\Controllers\OwnersController@index');
    // Route::post('register', 'App\Http\Controllers\OwnersController@store')->name('owner.register');


