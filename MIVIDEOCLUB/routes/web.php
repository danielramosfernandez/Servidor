<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
        echo "Hola mundo";
        //return view('welcome'); 

});
Route::get('pagina1', function () {
    return ('Estas en la página 1'); 
});

Route::get('pagina2/{id}', function ($id) {
    return 'User'. $id; 
});
Route::get('pagina3/{name?}', function($name = "Dani") { 
    return "Hola " . $name . " Guapo"; 
}); 