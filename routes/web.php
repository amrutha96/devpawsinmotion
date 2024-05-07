<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\AppointmentsController;
use App\Admin\Controllers\HomeController;

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
    Route::post('/create_appointment', 'create_appointment')->name('create_appointment');
    Route::delete('/book_appointment/{appointment}',  'destroy')->name('appointment.destroy');
    Route::get('/book_appointment/{appointment}/edit', 'edit')->name('appointment.edit');
    Route::post('/book_appointment/{appointment}',  'update')->name('appointment.update');
});
Route::controller(HomeController::class)->group(function(){
    Route::get('/admin/viewdogs/{id}', 'viewdogs')->name('admin.viewdogs');
});
