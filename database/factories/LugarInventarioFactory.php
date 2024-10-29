<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Inventario;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LugarInventario>
 */
class LugarInventarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //protected $fillable = ['nombre', 'id_inventario'];
        $id_inventario = Inventario::all()->random()->id;
        $letra_codigo = $this->faker->randomLetter();
        $codigo = $this->faker->randomNumber(4, true); 
        //Lugaes como Estante (con código), Pasillo, Caja, etc.
        $lugar = $this->faker->randomElement(['Estante', 'Pasillo', 'Caja', 'Armario', 'Congelador', 'Cámara frigorífica', 'Vitrina', 'Bandeja']);
        return [
            'nombre' => $lugar . ' ' . $letra_codigo . '-' . $codigo,
            'id_inventario' => $id_inventario
        ];
    }
}
