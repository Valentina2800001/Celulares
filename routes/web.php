<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('previo_iniciosesion');
});

Route::get('/inicio-sesion', function () {
    return view('inicio_sesion');
})->name('inicio.sesion');

Route ::get('pagina_principal' , function(){
    return view('pagina_principal');
})->name('pagina_principal');

Route ::get('formulario_iniciosesion', function(){
    return view ('formulario_iniciosesion');
})-> name('formulario_iniciosesion');