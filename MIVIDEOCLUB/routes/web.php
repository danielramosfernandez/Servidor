<?php

use Illuminate\Support\Facades\Route;

/* Aquí aparecera tal cual Hola Mundo */
Route::get('/', function () {
        echo "Hola mundo";
        //return view('welcome'); 
});

/* Utiliza la routa a pagina 1 para confirmar si está en la página 1 */
Route::get('pagina1', function () {
    return ('Estas en la página 1'); 
});

/* A la id se la rellena con un valor en este caso probamos con cinco */
Route::get('pagina2/{id}', function ($id) {
    return 'Hola: '. $id; 
});

/* En esta ruta lo que le damos es un valor */
Route::get('pagina3/{name?}', function($name = "Dani") { 
    return "Hola " . $name; 
}); 