<?php

namespace App\Http\Controllers;

use App\Models\Producto;

class HomeController extends Controller
{
    public function index()
    {
        $productos = Producto::all(); 
        return view('pagina_principal', compact('productos'));
    }
}
