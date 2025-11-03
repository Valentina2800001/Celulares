<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('previo_iniciosesion');
})->name('previo_iniciosesion');

Route::get('/inicio-sesion', [AuthController::class, 'showLogin'])->name('inicio.sesion');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('previo_iniciosesion');
})->name('logout');

// Formularios
Route::get('formulario_iniciosesion', function() {
    return view('formulario_iniciosesion');
})->name('formulario_iniciosesion');

Route::get('formulario_productos', function() {
    return view('formulario_productos');
})->name('formulario_productos');

// CRUD
Route::resource('usuarios', UsuarioController::class);
Route::resource('productos', ProductoController::class);

Route::get('/pagina_principal', [HomeController::class, 'index'])->name('pagina_principal');
