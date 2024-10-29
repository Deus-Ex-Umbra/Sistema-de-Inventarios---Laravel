<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    //Modelo: protected $fillable = ['nombre', 'descripcion', 'cantidad_total', 'valor_total', 'estado', 'ruta_imagen'];
    //Ver todos los inventarios activos
    public function viewAllInventarios()
    {
        return view('inventarios.index', ['inventarios' => self::getAllInventarios()]);
    }

    public static function getAllInventarios()
    {
        return Inventario::all();
    }

    //Crear un inventario
    public function viewCreateInventario()
    {
        return view('inventarios.create');
    }

    public static function createInventario(Request $request)
{
    $validated = $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'nullable|string|max:255',
        'ruta_imagen' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $data = [
        'nombre' => $validated['nombre'],
        'descripcion' => $validated['descripcion'] ?? '', // Asegúrate de que 'descripcion' no esté vacío.
    ];

    if ($request->hasFile('ruta_imagen')) {
        $imagen = $request->file('ruta_imagen');
        $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
        $imagen->move(public_path('images'), $nombreImagen);
        $data['ruta_imagen'] = $nombreImagen;
    }

    Inventario::create($data);

    // Añade un mensaje de depuración para verificar que el código se ejecuta.
    \Log::info('Inventario creado: ' . $data['nombre']);

    return redirect()->route('inventario.index')->with('success', 'Inventario creado exitosamente');
}


    //Actualizar un inventario
    public function viewUpdateInventario($id)
    {
        return view('inventarios.update', ['inventario' => self::getInventarioById($id)]);
    }

    public static function updateInventario(Request $request, $id)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:255',
            'ruta_imagen' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'nombre' => $validated['nombre'],
            'descripcion' => $validated['descripcion'] ?? '', // Asegúrate de que 'descripcion' no esté vacío.
        ];

        if ($request->hasFile('ruta_imagen')) {
            $imagen = $request->file('ruta_imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $imagen->move(public_path('images'), $nombreImagen);
            $data['ruta_imagen'] = $nombreImagen;
        }

        Inventario::findOrFail($id)->update($data);

        // Añade un mensaje de depuración para verificar que el código se ejecuta.
        \Log::info('Inventario actualizado: ' . $data['nombre']);

        return redirect()->route('inventario.index')->with('success', 'Inventario actualizado exitosamente');
    }


    //Actualizar cantidad y valor total
    public static function updateInventarioValues($id, $cantidad, $valor)
    {
        Inventario::find($id)->update(['cantidad_total' => $cantidad, 'valor_total' => $valor]);
        return redirect()->route('inventario.index')->with('success', 'Inventario actualizado exitosamente');
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

    //Mostrar inventarios según una lista de inventarios
    public function showInventariosByList($inventarios)
    {
        return view('inventarios.show', ['inventarios' => $inventarios]);
    }
    
    //Obtener la cantidad de productos caducados
    public static function getCantidadProductosCaducados($inventario_id)
    {
        $productos = Producto::where('inventario_id', $inventario_id)->get();
        $cantidad = 0;
        foreach ($productos as $producto) {
            $cantidad += ProductoController::getCantidadProductosCaducados($producto->id);
        }
        return $cantidad;
    }

    //Obtener el inventario según el id
    public static function getInventarioById($id)
    {
        return Inventario::find($id);
    }

    //Obtener el id del inventario según el id del producto
    public static function getInventarioIdByProductoId($producto_id)
    {
        return Producto::find($producto_id)->inventario_id;
    }

    //Agregar una cantidad y valor total al inventario
    public static function addCantidadTotalAndValorTotal($id, $cantidad, $valor)
    {
        //Debe sumar al inventario el valor y la cantidad total
        $inventario = Inventario::find($id);
        $inventario->cantidad_total += $cantidad;
        $inventario->valor_total += $valor;
        $inventario->save();
    }

    //Restar una cantidad y valor total al inventario
    public static function substractCantidadTotalAndValorTotal($id, $cantidad, $valor)
    {
        $inventario = Inventario::find($id);
        $inventario->cantidad_total -= $cantidad;
        $inventario->valor_total -= $valor;
        $inventario->save();
    }

    //Obtener todas las columnas de la tabla inventario
    public static function getAllColumnsInventario()
    {
        //Excepto el id
        return array_diff(\Schema::getColumnListing('inventarios'), ['id']);
    }

    //Buscar inventarios por condición según columna
    public static function searchInventariosByColumn(Request $request)
    {
        $query = Inventario::query();

        $searchParams = $request->except('_token'); // Excluir el token CSRF

        foreach ($searchParams as $key => $value) {
            if (!empty($value)) {
                //LIKE('%$value%');
                $query->where($key, 'like', '%' . $value . '%');
            }
        }
        $inventarios = $query->get();
        return view('inventarios.index', ['inventarios' => $inventarios]);
    }
}
