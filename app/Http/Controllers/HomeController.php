<?php

namespace App\Http\Controllers;

use App\Models\Producto;

class HomeController extends Controller
{
    public function index()
    {
        $productos = Producto::all(); // Trae todos los productos de la BD
        return view('pagina_principal', compact('productos'));
    }
}
