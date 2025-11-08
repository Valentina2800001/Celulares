<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // Constantes de validación para evitar duplicación
    private const REGLA_TEXTO_50 = 'required|string|max:50';
    private const REGLA_TEXTO_100 = 'required|string|max:100';
    private const REGLA_CORREO = 'required|email';
    private const REGLA_ENTERO = 'required|integer';

    // Constante para evitar duplicar el nombre del campo "contraseña"
    private const CAMPO_CONTRASENA = 'contraseña';

    public function index()
    {
        $usuarios = Usuario::all();
        return view('pagina_principal', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|unique:usuario,id',
            'nombre' => self::REGLA_TEXTO_100,
            'correo' => self::REGLA_CORREO . '|unique:usuario,correo',
            'rol' => self::REGLA_TEXTO_50,
            self::CAMPO_CONTRASENA => 'required|string',
            'numIdentificacion' => self::REGLA_ENTERO,
            'estado' => self::REGLA_TEXTO_50,
        ]);

        Usuario::create([
            'id' => $request->id,
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'rol' => $request->rol,
            self::CAMPO_CONTRASENA => bcrypt($request->{self::CAMPO_CONTRASENA}),
            'numIdentificacion' => $request->numIdentificacion,
            'estado' => $request->estado,
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente.');
    }

    public function show($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.show', compact('usuario'));
    }

    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        $request->validate([
            'nombre' => self::REGLA_TEXTO_100,
            'correo' => self::REGLA_CORREO . '|unique:usuario,correo,' . $id . ',id',
            'rol' => self::REGLA_TEXTO_50,
            'numIdentificacion' => self::REGLA_ENTERO,
            'estado' => self::REGLA_TEXTO_50,
        ]);

        $usuario->update([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'rol' => $request->rol,
            'numIdentificacion' => $request->numIdentificacion,
            'estado' => $request->estado,
            self::CAMPO_CONTRASENA => $request->{self::CAMPO_CONTRASENA}
                ? bcrypt($request->{self::CAMPO_CONTRASENA})
                : $usuario->{self::CAMPO_CONTRASENA},
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente.');
    }
}
