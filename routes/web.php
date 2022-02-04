<?php

use Illuminate\Support\Facades\Route;
/* 
Oltre alle rotte di autenticazione che già conoscete (/login, /logout, /register) avrete:
- ok - una pagina in cui mostrare i form di autenticazione (come avete già visto in questi giorni)
- una  rotta /posts in cui mostrare tutti i post presenti nel db
- una rotta /posts/create in cui è presente il form per creare un nuovo post
- una rotta /posts/store da chiamare dal form per creare effettivamente l'entità (ma questo lo sapete già)
*/

/* Auth::routes(); */

Route::get('/', 'GuestController@home')->name('home');

Route::get('/posts', 'HomeController@posts')->name('posts');

Route::get('/posts/create', 'HomeController@create')->name('create');
Route::post('/posts/store', 'HomeController@store')->name('store');


Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::post('/register', 'Auth\RegisterController@register')->name('register');
