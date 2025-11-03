<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    /**
     * Mostrar todos los productos.
     */
    public function index()
    {
        $productos = Producto::all();
        return view('pagina_principal', compact('productos'));
    }

    /**
     * Mostrar formulario para crear un nuevo producto.
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Guardar un nuevo producto en la base de datos.
     */
    public function store(Request $request)
    {
        // 🔹 Validaciones
        $request->validate([
            'id' => 'required|string|max:10|unique:productos,id',
            'nombre' => 'required|string|max:100',
            'categoria_id' => 'required|string|max:10',
            'precio' => 'required|string|max:20',
            'color' => 'required|string|max:50',
            'stock' => 'required|integer|min:0',
            'descripcion' => 'nullable|string',
            'estado' => 'required|in:Activo,Inactivo',
            'usuario_id' => 'required|string|max:10',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // 🔹 Crear nuevo producto
        $producto = new Producto();
        $producto->id = $request->id;
        $producto->nombre = $request->nombre;
        $producto->categoria_id = $request->id_categoria;
        $producto->precio = $request->precio;
        $producto->color = $request->color;
        $producto->stock = $request->stock;
        $producto->descripcion = $request->descripcion;
        $producto->estado = $request->estado;
        $producto->usuario_id = $request->usuario_id;

        // 🔹 Manejar imagen
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $imagen->move(public_path('imagenes_productos'), $nombreImagen);
            $producto->imagen = $nombreImagen;
        }

        $producto->save();

        return redirect()->route('productos.index')->with('success', 'Producto registrado correctamente.');
    }

    /**
     * Mostrar un producto específico.
     */
    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.show', compact('producto'));
    }

    /**
     * Mostrar formulario para editar un producto.
     */
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.edit', compact('producto'));
    }

    /**
     * Actualizar un producto existente.
     */
    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:100',
            'categoria_id' => 'required|string|max:10',
            'precio' => 'required|string|max:20',
            'color' => 'required|string|max:50',
            'stock' => 'required|integer|min:0',
            'descripcion' => 'nullable|string',
            'estado' => 'required|in:Activo,Inactivo',
            'id_usuario' => 'required|string|max:10',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $producto->nombre = $request->nombre;
        $producto->categoria_id = $request->id_categoria;
        $producto->precio = $request->precio;
        $producto->color = $request->color;
        $producto->stock = $request->stock;
        $producto->descripcion = $request->descripcion;
        $producto->estado = $request->estado;
        $producto->id_usuario = $request->id_usuario;

        // 🔹 Si se sube una nueva imagen, reemplazar la anterior
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $imagen->move(public_path('imagenes_productos'), $nombreImagen);
            $producto->imagen = $nombreImagen;
        }

        $producto->save();

        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente.');
    }

    /**
     * Eliminar un producto.
     */
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);

        // Eliminar imagen si existe
        if ($producto->imagen && file_exists(public_path('imagenes_productos/' . $producto->imagen))) {
            unlink(public_path('imagenes_productos/' . $producto->imagen));
        }

        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente.');
    }
}
