<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// 1. Napraviti rutu za izlistavanje svih proizvoda s Paginacijom. --> / products
Route::get('/products', [ProductController::class, 'index']);

// 2. Napraviti rutu za izlistavanje proizvoda unutar kategorije s paginacijom. --> /categories/1/products
Route::get('/categories/{category}/products', [ProductController::class, 'index']);

// 3. Napraviti rutu za jedan proizvod. --> /products/7
Route::get('/products/{product}', [ProductController::class, 'show']);

// 4. Napraviti rutu za filtriranje proizvoda po cijeni, nazivu i kategoriji te sortiranje proizvoda po cijeni i po nazivu silazno/uzlazno.
// testirati pod rutom broj 1

// 5. Napraviti rutu za dodavanje nove narudžbe koja prima array od proizvoda.
Route::post('/store', [OrderController::class, 'store']);
// Route::get('/orders', [OrderController::class, 'index']);
