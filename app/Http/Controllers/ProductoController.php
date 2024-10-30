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
        return view('productos.index', ['productos' => self::getAllProductos()]);
    }

    public static function getAllProductos()
    {
        return Producto::all();
    }

    //Obtener todos los productos según inventario
    public function viewAllProductosByInventario($inventario_id)
    {
        return view('productos.index', ['productos' => self::getAllByInventario($inventario_id), 'id_inventario' => $inventario_id]);
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

    public static function createProducto(Request $request)
    {
        $validate = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'ruta_imagen' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
            'categoria_id' => 'required|integer',
            'marca_id' => 'required|integer',
            'proveedor_id' => 'required|integer',
            'inventario_id' => 'required|integer'
        ]);
        /*$data = [
            'nombre' => $validated['nombre'],
            'descripcion' => $validated['descripcion'] ?? '', // Asegúrate de que 'descripcion' no esté vacío.
        ];
    
        if ($request->hasFile('ruta_imagen')) {
            $imagen = $request->file('ruta_imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $imagen->move(public_path('images'), $nombreImagen);
            $data['ruta_imagen'] = $nombreImagen;
        }*/

        $data = [
            'nombre' => $validate['nombre'],
            'descripcion' => $validate['descripcion'],
            'categoria_id' => $validate['categoria_id'],
            'marca_id' => $validate['marca_id'],
            'proveedor_id' => $validate['proveedor_id'],
            'inventario_id' => $validate['inventario_id'],
        ];

        if($request->hasFile('ruta_imagen')){
            $imagen = $request->file('ruta_imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $imagen->move(public_path('images'), $nombreImagen);
            $data['ruta_imagen'] = $nombreImagen;
        }
        $producto = Producto::create($data);
        $id_inventario = $producto->inventario_id;
        return redirect()->route('inventario.productos', $id_inventario)->with('success', 'Producto actualizado exitosamente');
    }

    //Actualizar un producto
    public function viewUpdateProducto($id)
    {
        return view('productos.update', ['producto' => self::getProductoById($id)]);
    }

    public static function updateProducto(Request $request, $id)
    {
        $validate = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'ruta_imagen' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
            'categoria_id' => 'required|integer',
            'marca_id' => 'required|integer',
            'proveedor_id' => 'required|integer',
        ]);
    
        $data = [
            'nombre' => $validate['nombre'],
            'descripcion' => $validate['descripcion'],
            'categoria_id' => $validate['categoria_id'],
            'marca_id' => $validate['marca_id'],
            'proveedor_id' => $validate['proveedor_id'],
        ];
    
        if ($request->hasFile('ruta_imagen')) {
            $imagen = $request->file('ruta_imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $imagen->move(public_path('images'), $nombreImagen);
            $data['ruta_imagen'] = $nombreImagen; // Añadimos la ruta de la imagen al arreglo de datos
        }
    
        // Actualizamos el producto con todos los datos en el arreglo $data
        $producto = Producto::findOrFail($id);
        $producto->update($data);
    
        // Redireccionamos a la ruta deseada
        return redirect()->route('inventario.productos', $producto->inventario_id)->with('success', 'Producto actualizado exitosamente');
    }
    

    public static function getProductoById($id)
    {
        return Producto::find($id);
    }

    //Eliminar un producto
    public static function deletProducto($id)
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
