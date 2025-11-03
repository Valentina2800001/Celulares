<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // 📄 Mostrar lista de usuarios
    public function index()
    {
        $usuarios = Usuario::all();
        return view('pagina_principal', compact('usuarios'));
    }

    // 🆕 Mostrar formulario de creación
    public function create()
    {
        return view('usuarios.create');
    }

    // 💾 Guardar nuevo usuario
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|unique:usuario,id',
            'nombre' => 'required|string|max:100',
            'correo' => 'required|email|unique:usuario,correo',
            'rol' => 'required|string|max:50',
            'contraseña' => 'required|string',
            'numIdentificacion' => 'required|integer',
            'estado' => 'required|string|max:50',
        ]);

        Usuario::create([
            'id' => $request->id,
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'rol' => $request->rol,
            'contraseña' => bcrypt($request->contraseña),
            'numIdentificacion' => $request->numIdentificacion,
            'estado' => $request->estado,
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente.');
    }

    // 👁️ Mostrar usuario específico
    public function show($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.show', compact('usuario'));
    }

    // ✏️ Mostrar formulario para editar
    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

    // 🔄 Actualizar usuario
    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:100',
            'correo' => 'required|email|unique:usuario,correo,' . $id . ',id',
            'rol' => 'required|string|max:50',
            'numIdentificacion' => 'required|integer',
            'estado' => 'required|string|max:50',
        ]);

        $usuario->update([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'rol' => $request->rol,
            'numIdentificacion' => $request->numIdentificacion,
            'estado' => $request->estado,
            'contraseña' => $request->contraseña ? bcrypt($request->contraseña) : $usuario->contraseña,
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente.');
    }

    // 🗑️ Eliminar usuario
    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente.');
    }
}
