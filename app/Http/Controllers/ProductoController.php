<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    //protected $fillable = ['nombre', 'descripcion', 'cantidad_total', 'valor_total', 'ruta_imagen', 'categoria_id', 'marca_id', 'proveedor_id', 'inventario_id'];
    //Obtener todos los productos
    public function viewAllProductos()
    {
        return view('productos.index', ['productos' => self::getAll()]);
    }

    public static function getAll()
    {
        return Producto::all();
    }

    //Obtener todos los productos según inventario
    public function viewAllProductosByInventario($inventario_id)
    {
        return view('productos.index', ['productos' => self::getAllByInventario($inventario_id)]);
    }

    public static function getAllByInventario($inventario_id)
    {
        return Producto::where('inventario_id', $inventario_id)->get();
    }

    //Crear un producto
    public function viewCreateProducto($id_inventario)
    {
        return view('productos.create', ['inventario_id' => $id_inventario]);
    }

    public static function create(Request $request)
    {
        $validate = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            //'cantidad_total' => 'required|integer',
            //'valor_total' => 'required|integer',
            'ruta_imagen' => 'required|string|max:255',
            'categoria_id' => 'required|integer',
            'marca_id' => 'required|integer',
            'proveedor_id' => 'required|integer',
            'inventario_id' => 'required|integer'
        ]);
    }

    //Actualizar un producto
    public function viewUpdateProducto($id)
    {
        return view('productos.update', ['producto' => self::getProductoById($id)]);
    }

    public static function getProductoById($id)
    {
        return Producto::find($id);
    }

    //Eliminar un producto
    public static function delete($id)
    {
        Producto::find($id)->delete();
        return redirect()->route('producto.index')->with('success', 'Producto eliminado exitosamente');
    }

    //Devolver la cantidad de productos caducados
    public static function getCantidadProductosCaducados($producto_id)
    {
        //Primero se debe hacer una lista de lotes asociados a un producto
        //Lote: protected $fillable = ['numero', 'descripcion', 'cantidad_total', 'valor_total', 'precio_unitario', 'fecha_ingreso', 'fecha_vencimiento', 'producto_id'];
        $lotes = Lote::where('producto_id', $producto_id)->get();
        $cantidad = 0;
        foreach ($lotes as $lote) {
            if ($lote->fecha_vencimiento < now()) {
                $cantidad += $lote->cantidad_total;
            }
        }
        return $cantidad;
    }

    //Obtener el id del inventario según el id del producto
    public static function getInventarioIdByProductoId($producto_id)
    {
        return Producto::find($producto_id)->inventario_id;
    }

    //Actualizar cantidad y valor total del producto
    public static function updateProductoValues($id, $cantidad, $valor)
    {
        Producto::find($id)->update(['cantidad_total' => $cantidad, 'valor_total' => $valor]);
        return redirect()->back()->with('success', 'Producto actualizado exitosamente');
    }

    //Agregar una cantidad y valor total al producto
    public static function addCantidadTotalAndValorTotal($id, $cantidad, $valor)
    {
        $producto = Producto::find($id);
        $producto->cantidad_total += $cantidad;
        $producto->valor_total += $valor;
        $producto->save();
    }

    //Restar una cantidad y valor total al producto
    public static function substractCantidadTotalAndValorTotal($id, $cantidad, $valor)
    {
        $producto = Producto::find($id);
        $producto->cantidad_total -= $cantidad;
        $producto->valor_total -= $valor;
        $producto->save();
    }

    //Obtener todas las columnas de la tabla producto
    public static function getAllColumnsProducto()
    {
        //Excepto el id
        return array_diff(\Schema::getColumnListing('productos'), ['id', 'cantidad_total', 'valor_total', 'ruta_imagen']);
    }

    //Buscar productos por condición según columna
    public static function searchProductosByColumn(Request $request)
    {
        $query = Producto::query();

        $searchParams = $request->except('_token'); // Excluir el token CSRF

        foreach ($searchParams as $key => $value) {
            if (!empty($value)) {
                //LIKE('%$value%');
                $query->where($key, 'like', '%' . $value . '%');
            }
        }
        $productos = $query->get();
        return view('productos.index', ['productos' => $productos]);
    }
}
