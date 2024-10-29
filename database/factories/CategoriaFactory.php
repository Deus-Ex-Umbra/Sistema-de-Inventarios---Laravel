<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categoria>
 */
class CategoriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //protected $fillable = ['nombre'];
        //Categorías de Productos de Farmacia
        $nombre = $this->faker->unique()->randomElement([
            'Analgésicos', 'Antibióticos', 'Antiparasitarios', 'Antidiarreicos',
            'Antitusivos', 'Antidepresivos', 'Antialérgicos', 'Antiinflamatorios',
            'Anticoagulantes', 'Antiácidos', 'Antieméticos', 'Antivirales',
            'Vitaminas y Minerales', 'Suplementos Nutricionales', 'Productos Naturales',
            'Dermatológicos', 'Oftalmológicos', 'Productos de Higiene Personal',
            'Material de Curación', 'Equipo Médico', 'Ortopedia',
            'Cuidado Bucal', 'Cuidado del Cabello', 'Cuidado de la Piel',
            'Productos para Bebés', 'Control de Peso', 'Primeros Auxilios',
            'Productos para Diabéticos', 'Productos de Planificación Familiar',
            'Productos de Rehabilitación', 'Otros'
        ]);
        return [
            'nombre' => $nombre
        ];
    }
}
