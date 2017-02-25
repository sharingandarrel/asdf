<?php

Route::get('/', function () {
    return view('home');
});


Route::get('/signin', function () {
    return view('login');
});


Route::get('/register', function () {
    return view('register.register');
});


Route::get('/dashboard', function () {
    return view('dashboard');
});


Route::post('/register_action','RegisterController@store');

Route::post('/login_check','RegisterController@login');

Route::resource('blog', 'BlogController');

Route::get('/logout',function () {

   Auth::logout();
   return Redirect::to('');

})->middleware("auth");
