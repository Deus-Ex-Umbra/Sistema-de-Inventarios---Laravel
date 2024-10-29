<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    //protected $fillable = ['nombre', 'direccion', 'telefono', 'email'];
    //Obtener todos los proveedores
    public function viewAllProveedores()
    {
        return view('proveedores.index', ['proveedores' => self::getAll()]);
    }
    
    public static function getAll()
    {
        return Proveedor::all();
    }

    //Crear un proveedor
    public function viewCreateProveedor()
    {
        return view('proveedores.create');
    }

    public static function create(Request $request)
    {
        $validate = $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'email' => 'required|string|email|max:255'
        ]);
        Proveedor::create($validate);
        return redirect()->back();
    }
    
    //Actualizar un proveedor
    public function viewUpdateProveedor($id)
    {
        return view('proveedores.update', ['proveedor' => Proveedor::find($id)]);
    }

    public static function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'email' => 'required|string|email|max:255'
        ]);
        Proveedor::find($id)->update($validate);
        return redirect()->back();
    }

    //Eliminar un proveedor
    public static function delete($id)
    {
        Proveedor::find($id)->delete();
        return redirect()->back();
    }
}
