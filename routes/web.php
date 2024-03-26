<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnersController;

    
    Route::get('/', function () {
        return view('\home\homepage');
    });

    Route::get('/login', function () {
        return view('\home\login');
    });

    Route::get('/register', 'App\Http\Controllers\OwnersController@index');
    Route::post('register', 'App\Http\Controllers\OwnersController@store')->name('owner.register');


