<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    //Obtener todas las marcas
    public static function getAllMarcas()
    {
        return Marca::all();
    }

    //Crear una marca
    public function viewCreateMarca()
    {
        return view('marcas.create');
    }

    public static function createMarca(Request $request)
    {
        $validate = $request->validate([
            'nombre' => 'required|string|max:255'
        ]);
        Marca::create($validate);
        return redirect()->back();
    }
    
    //Actualizar una marca
    public function viewUpdateMarca($id)
    {
        return view('marcas.update', ['marca' => Marca::find($id)]);
    }

    public static function updateMarca(Request $request, $id)
    {
        $validate = $request->validate([
            'nombre' => 'required|string|max:255'
        ]);
        Marca::find($id)->update($validate);
        return redirect()->back();
    }

    //Eliminar una marca
    public static function deleteMarca($id)
    {
        Marca::find($id)->delete();
        return redirect()->back();
    }
}
