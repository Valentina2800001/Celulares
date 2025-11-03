<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('previo_iniciosesion');
})->name('previo_iniciosesion');;

Route::get('/inicio-sesion', function () {
    return view('inicio_sesion');
})->name('inicio.sesion');

Route ::get('pagina_principal' , function(){
    return view('pagina_principal');
})->name('pagina_principal');

Route ::get('formulario_iniciosesion', function(){
    return view ('formulario_iniciosesion');
})-> name('formulario_iniciosesion');

Route::resource('usuarios', UsuarioController::class);

use App\Http\Controllers\AuthController;

Route::get('/inicio-sesion', [AuthController::class, 'showLogin'])->name('inicio.sesion');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('previo_iniciosesion');
})->name('logout');