<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto; // 👈 Importar el modelo

class ProductoController extends Controller
{
   public function catalogo(Request $request)
    {
        $min = $request->get('min', 0);
        $max = $request->get('max');

        $query = Producto::query();

        if ($max) {
            $query->whereBetween('Precio', [$min, $max]);
        } else {
            $query->where('Precio', '>=', $min);
        }

        $productos = $query->get();

        return view('productos.catalogo', compact('productos', 'min', 'max'));
    }

    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

   public function store(Request $request)
    {
        $data = $request->validate([
            'Nombre' => 'required|string|max:255',
            'Descripcion' => 'nullable|string',
            'Precio' => 'required|numeric',
            'estado' => 'required|boolean',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('imagenes', 'public');
        }

        Producto::create($data);

        return redirect()->route('productos.index')->with('success', 'Producto creado correctamente');
    }
    
    public function edit(Producto $producto)
    {
        return view('productos.create', compact('producto'));
    }

   public function update(Request $request, Producto $producto)
    {
        $data = $request->validate([
            'Nombre' => 'required|string|max:255',
            'Descripcion' => 'nullable|string',
            'Precio' => 'required|numeric',
            'estado' => 'required|boolean',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('imagenes', 'public');
        }

        $producto->update($data);

        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')
            ->with('success', 'Producto eliminado correctamente');
    }
}