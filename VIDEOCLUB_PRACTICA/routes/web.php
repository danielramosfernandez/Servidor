<?php

use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('catalog.index'); 
});

Route::get('/login', function () {
    return view(); 
});
Route::get('/logout', function () {
    return view(); 
});
Route::get('/catalog', function () {
    return view(); 
});

Route::get('/catalog/show/{id}', function ($id) {
    return view(show.blade.php); 
});

Route::get('/catalog/create', function () {
    return view(create.blade.php); 
});

Route::get('catalog/edit/{id}', function ($id) {
    return view(edit.blade.php). $id; 
});




