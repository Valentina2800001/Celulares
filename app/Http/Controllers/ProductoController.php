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
        return view('formulario_productos');
    }

    /**
     * Guardar un nuevo producto en la base de datos.
     */
    public function store(Request $request)
    {
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

        $producto = new Producto();
        $producto->id = $request->id;
        $producto->nombre = $request->nombre;
        $producto->categoria_id = $request->categoria_id;
        $producto->precio = $request->precio;
        $producto->color = $request->color;
        $producto->stock = $request->stock;
        $producto->descripcion = $request->descripcion;
        $producto->estado = $request->estado;
        $producto->usuario_id = $request->usuario_id;

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $imagen->move(public_path('imagenes_productos'), $nombreImagen);
            $producto->imagen = $nombreImagen;
        }

        $producto->save();

        return redirect()->route('pagina_principal')->with('success', '✅ El producto se actualizó correctamente.');

    }

    /**
     * Mostrar un producto específico.
     */
    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return view('show', compact('producto'));
    }

    /**
     * Mostrar formulario para editar un producto.
     */
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('edit', compact('producto'));
    }

    /**
     * Actualizar un producto existente.
     */
    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:100',
            'precio' => 'required|string|max:20',
            'color' => 'required|string|max:50',
            'stock' => 'required|integer|min:0',
            'descripcion' => 'nullable|string',
            'estado' => 'required|in:Activo,Inactivo',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->color = $request->color;
        $producto->stock = $request->stock;
        $producto->descripcion = $request->descripcion;
        $producto->estado = $request->estado;

        if ($request->hasFile('imagen')) {
    $imagen = $request->file('imagen');
    $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
    $imagen->move(public_path('imagenes_productos'), $nombreImagen);
    $producto->imagen = $nombreImagen;
}


        $producto->save();

       return redirect('/pagina_principal')->with('success', '✅ Producto actualizado correctamente.');


    }

    /**
     * Eliminar un producto.
     */
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);

        if ($producto->imagen && file_exists(public_path('imagenes_productos/' . $producto->imagen))) {
            unlink(public_path('imagenes_productos/' . $producto->imagen));
        }

        $producto->delete();

        return redirect()->route('pagina_principal')->with('success', '🗑️ Producto eliminado correctamente.');
    }

        /**
     * Mostrar productos por categorías.
     */
public function mostrarPorCategoria(Request $request)
{
    $categoria = $request->input('categoria', 'todas'); // 'todas' por defecto

    if ($categoria == 'todas') {
        $productos = Producto::all();
    } else {
        $productos = Producto::where('categoria_id', $categoria)->get();
    }

    return view('categorias', compact('productos'));
}


}
