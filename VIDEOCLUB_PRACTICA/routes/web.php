<?php
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');
Route::get('/catalog/show/{id}', [CatalogController::class, 'show'])->name('catalog.show');
Route::get('/catalog/create', [CatalogController::class, 'create'])->name('catalog.create');
Route::get('/catalog/edit/{id}', [CatalogController::class, 'edit'])->name('catalog.edit');

