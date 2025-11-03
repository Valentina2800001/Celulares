<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('inicio_sesion');
    }

    public function login(Request $request)
    {
        $request->validate([
            'correo' => 'required|email',
            'contraseña' => 'required',
        ]);

        $usuario = Usuario::where('correo', $request->correo)->first();

        if ($usuario && Hash::check($request->contraseña, $usuario->contraseña)) {
            // Guardamos el usuario autenticado en sesión
            session(['usuario' => $usuario]);

            return redirect()->route('pagina_principal')->with('success', 'Inicio de sesión exitoso');
        }

        return back()->withErrors(['correo' => 'Credenciales incorrectas.']);
    }

    public function logout()
    {
        session()->forget('usuario');
        return redirect()->route('inicio.sesion')->with('success', 'Sesión cerrada correctamente.');
    }
}
