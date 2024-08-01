<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
    // return 'Main Page';
})->name('my route');


Route::get('/hello', function(){
    return "you're back in the main page";
})->name('hello');

//redirect url
Route::get('/redirect', function(){
    return redirect('hello');
});


//For not listed url, it will redirect to this route. 
Route::fallback(function(){
    return ' where are you going actually huh?, this page has been return by fallback route';
});

