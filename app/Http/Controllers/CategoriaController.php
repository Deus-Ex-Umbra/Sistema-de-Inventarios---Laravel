<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    //Obtener todas las categorías
    public static function getAll()
    {
        return Categoria::all();
    }

    //Crear una categoría
    public function viewCreateCategoria()
    {
        return view('categorias.create');
    }

    public static function create(Request $request)
    {
        $validate = $request->validate([
            'nombre' => 'required|string|max:255'
        ]);
        Categoria::create($validate);
        return redirect()->back();
    }
    
    //Actualizar una categoría
    public function viewUpdateCategoria($id)
    {
        return view('categorias.update', ['categoria' => Categoria::find($id)]);
    }

    public static function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nombre' => 'required|string|max:255'
        ]);
        Categoria::find($id)->update($validate);
        return redirect()->back();
    }

    //Eliminar una categoría
    public static function delete($id)
    {
        Categoria::find($id)->delete();
        return redirect()->back();
    }
}
