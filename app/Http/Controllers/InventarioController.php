<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    //Modelo: protected $fillable = ['nombre', 'descripcion', 'cantidad_total', 'valor_total', 'estado', 'ruta_imagen'];
    //Ver todos los inventarios activos
    public function viewAllInventariosActives()
    {
        return view('inventarios.index', ['inventarios' => self::getAllInventariosActives()]);
    }

    public static function getAllInventariosActives()
    {
        return Inventario::where('estado', 'activo')->get();
    }

    //Crear un inventario
    public function viewCreateInventario()
    {
        return view('inventarios.create');
    }

    public static function createInventario(Request $request)
    {
        $validate = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:255',
            //'cantidad_total' => 'required|integer',
            //'valor_total' => 'required|numeric',
            //'estado' => 'required|string|max:255',
            'ruta_imagen' => 'nullable|string|max:255',
        ]);
        Inventario::create($validate);
        return redirect()->back()->with('success', 'Inventario creado exitosamente');
    }

    //Actualizar un inventario
    public function viewUpdateInventario($id)
    {
        return view('inventarios.update', ['inventario' => self::getInventarioById($id)]);
    }

    public static function updateInventario(Request $request, $id)
    {
        $validate = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:255',
            //'cantidad_total' => 'required|integer',
            //'valor_total' => 'required|numeric',
            //'estado' => 'required|string|max:255',
            'ruta_imagen' => 'nullable|string|max:255',
        ]);
        Inventario::find($id)->update($validate);
        return redirect()->back()->with('success', 'Inventario actualizado exitosamente');
    }

    //Actualizar cantidad y valor total
    public static function updateInventarioValues($id, $cantidad, $valor)
    {
        Inventario::find($id)->update(['cantidad_total' => $cantidad, 'valor_total' => $valor]);
        return redirect()->back()->with('success', 'Inventario actualizado exitosamente'); 
    }

    //Eliminar un inventario
    public function viewDeleteInventario($id)
    {
        return view('inventarios.delete', ['inventario' => self::getInventarioById($id)]);
    }

    public static function deleteInventario($id)
    {
        Inventario::find($id)->update(['estado' => 'inactivo']);
        return redirect()->back()->with('success', 'Inventario eliminado exitosamente');
    }

    
}
