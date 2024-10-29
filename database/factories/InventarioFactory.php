<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventario>
 */
class InventarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    //Para un inventario de una farmacia
    public function definition(): array
    {
        //protected $fillable = ['nombre', 'descripcion', 'cantidad_total', 'valor_total', 'estado', 'ruta_imagen'];
        //ciudades de Bolivia
        $ciudades = $this->faker->randomElement(['La Paz', 'Santa Cruz', 'Cochabamba', 'Sucre', 'Tarija', 'Potosí', 'Oruro', 'Trinidad', 'Cobija', 'El Alto', 'Montero', 'Quillacollo', 'Sacaba', 'Viacha', 'Yacuiba', 'Riberalta', 'Warnes', 'La Guardia', 'Tupiza', 'Villazón']);
        $lugares = $this->faker->randomElement(['Almacén', 'Bodega', 'Oficina', 'Farmacia']);
        $nombre = 'Inventario de ' . $lugares . ' ' . $ciudades;
        $ruta_imagen = str_replace(' ', '_', strtolower($nombre)) . '.jpg';
        return [
            'nombre' => $nombre,
            'descripcion' => $this->faker->sentence(),
            'cantidad_total' => 0,
            'valor_total' => 0,
            'estado' => 'activo',
            'ruta_imagen' => $ruta_imagen
        ];
    }
}
