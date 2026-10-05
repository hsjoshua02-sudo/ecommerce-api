<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController; // O el controlador que uses para productos

Route::post('/login', [AuthController::class, 'login']);

// Agrega la ruta de productos (protegida o pública según tu diseño)
Route::get('/products', [ProductController::class, 'index']);