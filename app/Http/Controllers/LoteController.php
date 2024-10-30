<?php

namespace App\Http\Controllers;

use App\Models\Lote;
use Illuminate\Http\Request;

class LoteController extends Controller
{
    //protected $fillable = ['numero', 'descripcion', 'cantidad_total', 'valor_total', 'precio_unitario', 'fecha_ingreso', 'fecha_vencimiento', 'producto_id'];
    //Obtener todos los lotes
    public function viewAllLotes()
    {
        return view('lotes.index', ['lotes' => self::getAllLotes()]);
    }

    public static function getAllLotes()
    {
        return Lote::all();
    }

    //Obtener todos los lotes por producto
    public function viewAllLotesByProducto($producto_id)
    {
        return view('lotes.index', ['lotes' => self::getAllLotesByProducto($producto_id)]);
    }

    public static function getAllLotesByProducto($producto_id)
    {
        return Lote::where('producto_id', $producto_id)->get();
    }


    //Crear un lote
    public function viewCreateLote()
    {
        return view('lotes.create');
    }

    public function createLote(Request $request)
    {
        $validated = $request->validate([
            'numero' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:255',
            'precio_unitario' => 'required|numeric',
            'fecha_ingreso' => 'required|date',
            'fecha_vencimiento' => 'required|date',
            'producto_id' => 'required|exists:productos,id',
        ]);
        Lote::create($validated);
        return redirect()->route('lote.index')->with('success', 'Lote creado exitosamente');
    }

    //Actualizar un lote
    public function viewUpdateLote($id)
    {
        return view('lotes.update', ['lote' => Lote::find($id)]);
    }

    public function updateLote(Request $request, $id)
    {
        $validated = $request->validate([
            'numero' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:255',
            'precio_unitario' => 'required|numeric',
            'fecha_ingreso' => 'required|date',
            'fecha_vencimiento' => 'required|date',
            'producto_id' => 'required|exists:productos,id',
        ]);
        $lote = Lote::find($id);
        $lote->update($validated);
        return redirect()->route('lote.index')->with('success', 'Lote actualizado exitosamente');
    }

    //Eliminar un lote
    public function deleteLote($id)
    {
        Lote::find($id)->delete();
        return redirect()->route('lote.index')->with('success', 'Lote eliminado exitosamente');
    }

    //Agregar una cantidad y valor total al lote
    public static function addCantidadTotalAndValorTotal($id, $cantidad, $valor)
    {
        $lote = Lote::find($id);
        $lote->cantidad_total += $cantidad;
        $lote->valor_total += $valor;
        $lote->save();
    }

    //Restar una cantidad y valor total al lote
    public static function substractCantidadTotalAndValorTotal($id, $cantidad, $valor)
    {
        $lote = Lote::find($id);
        $lote->cantidad_total -= $cantidad;
        $lote->valor_total -= $valor;
        $lote->save();
    }

    //Modificar valores del lote
    public static function modifyValuesLote($id, $cantidad, $valor)
    {
        $lote = Lote::find($id);
        $old_cantidad_total = $lote->cantidad_total;
        $old_valor_total = $lote->valor_total;
        $lote->cantidad_total = $cantidad;
        $lote->valor_total = $valor;
        $lote->save();
        $producto_id = $lote->producto_id;
        $inventario_id = InventarioController::getInventarioByProductoId($producto_id)->id;
        if ($old_cantidad_total > $cantidad) {
            ProductoController::substractCantidadTotalAndValorTotal($producto_id, $lote->cantidad_total, $lote->valor_total);
            InventarioController::substractCantidadTotalAndValorTotal($inventario_id, $lote->cantidad_total, $lote->valor_total);
        } else {
            ProductoController::addCantidadTotalAndValorTotal($producto_id, $lote->cantidad_total, $lote->valor_total);
            InventarioController::addCantidadTotalAndValorTotal($inventario_id, $lote->cantidad_total, $lote->valor_total);
        }
        return redirect()->route('lote.index')->with('success', 'Valores del lote modificados exitosamente');
    }

    //Obtener todas las columnas de la tabla lote
    public static function getAllColumnsLote()
    {
        //Excepto el id
        return array_diff(\Schema::getColumnListing('lotes'), ['id']);
    }

    //Buscar lotes por condición según columna
    public static function searchLotesByColumn(Request $request)
    {
        $query = Lote::query();

        $searchParams = $request->except('_token'); // Excluir el token CSRF

        foreach ($searchParams as $key => $value) {
            if (!empty($value)) {
                //LIKE('%$value%');
                $query->where($key, 'like', '%' . $value . '%');
            }
        }
        $lotes = $query->get();
        return view('lotes.index', ['lotes' => $lotes]);
    }
}
