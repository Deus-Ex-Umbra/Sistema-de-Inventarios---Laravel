<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Detalle>
 */
class DetalleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //protected $fillable = ['detalle_registro'];
        //Detalles como entradas, salidas, devoluciones, reembolsos, etc., todo referido a una farmacia:
        $detalles = $this->faker->randomElement(['Entrada', 'Salida', 'Devolución', 'Reembolso', 'Traslado', 'Otros']);
        return [
            'detalle_registro' => $detalles
        ];
    }
}
