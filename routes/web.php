<?php

use Illuminate\Support\Facades\Route;

/* Auth::routes(); */

Route::get('/', 'GuestController@home')->name('home');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::post('/register', 'Auth\RegisterController@register')->name('register');
