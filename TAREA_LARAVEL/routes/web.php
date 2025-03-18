<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PictogramaController;

Route::get('/pictogramas', [PictogramaController::class, 'index']);
