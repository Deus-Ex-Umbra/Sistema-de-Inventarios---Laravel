<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Producto;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\InventarioController;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lote>
 */
class LoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //protected $fillable = ['numero', 'descripcion', 'cantidad_total', 'valor_total', 'precio_unitario', 'fecha_ingreso', 'fecha_vencimiento', 'producto_id'];
        $id_producto = Producto::all()->random()->id;
        $precio_unitario = $this->faker->randomFloat(2, 1, 100);
        $cantidad_total = $this->faker->numberBetween(1, 1000);
        $valor_total = $cantidad_total * $precio_unitario;
        $fecha_ingreso = $this->faker->date();
        //Agregar n meses hasta 4 años al vencimiento de fecha ingreso 
        $tiempo_vencimiento = $this->faker->numberBetween(1, 48);
        $fecha_vencimiento = $this->faker->dateTimeBetween($fecha_ingreso, '+'.$tiempo_vencimiento.' months');
        $producto = ProductoController::getProductoById($id_producto);
        $id_inventario = ProductoController::getInventarioIdByProductoId($id_producto);
        $inventario = InventarioController::getInventarioById($id_inventario);
        $producto->cantidad_total += $cantidad_total;
        $producto->valor_total += $valor_total;
        $inventario->cantidad_total += $cantidad_total;
        $inventario->valor_total += $valor_total;
        $producto->save();
        $inventario->save();
        return [
            'numero' => $this->faker->numberBetween(1000, 100000),
            'descripcion' => $this->faker->text(100),
            'cantidad_total' => $cantidad_total,
            'valor_total' => $valor_total,
            'precio_unitario' => $precio_unitario,
            'fecha_ingreso' => $fecha_ingreso,
            'fecha_vencimiento' => $fecha_vencimiento,
            'producto_id' => $id_producto
        ];
    }
}
