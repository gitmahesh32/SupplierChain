<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\CommonController;


Route::controller(LoginRegisterController::class)->group(function(){
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/home', 'home')->name('home')->middleware('auth');
    Route::post('/logout', 'logout')->name('logout')->middleware('auth');
});


Route::controller(CommonController::class)->group(function(){
    Route::post('tableOne','tableOne')->name('tableOne')->middleware('auth');
    
});



Route::get('/', function () {
    return view('auth.login');
});
