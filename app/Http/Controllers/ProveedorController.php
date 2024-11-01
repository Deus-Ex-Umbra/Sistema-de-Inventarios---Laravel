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
        return view('proveedores.index', ['proveedores' => self::getAllProveedores()]);
    }

    public static function getAllProveedores()
    {
        return Proveedor::all();
    }

    //Crear un proveedor
    public function viewCreateProveedor()
    {
        return view('proveedores.create');
    }

    public static function createProveedor(Request $request)
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
    public static function deleteProveedor($id)
    {
        Proveedor::findOrFail($id)->delete();
        return redirect()->route('proveedor.index')->with('success', 'Proveedor eliminado exitosamente');
    }

    //Obtener todas las columnas de la tabla proveedor
    public static function getAllColumnsProveedor()
    {
        //Excepto el id
        return array_diff(\Schema::getColumnListing('proveedores'), ['id']);
    }

    //Buscar proveedores por condición según columna
    public static function searchProveedoresByColumn(Request $request)
    {
        $query = Proveedor::query();

        $searchParams = $request->except('_token'); // Excluir el token CSRF

        foreach ($searchParams as $key => $value) {
            if (!empty($value)) {
                //LIKE('%$value%');
                $query->where($key, 'like', '%' . $value . '%');
            }
        }
        $proveedores = $query->get();
        return view('proveedores.index', ['proveedores' => $proveedores]);
    }

    //Devolver todos los proveedores únicos
    public static function getAllUniqueProveedores()
    {
        return Proveedor::distinct()->get();
    }
}
