<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json([
            [
                'id' => 1,
                'name' => 'Producto de Prueba',
                'price' => 25.00,
                'description' => 'Descripción del producto'
            ]
        ]);
    }
}