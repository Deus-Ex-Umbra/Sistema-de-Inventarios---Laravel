<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Proveedor>
 */
class ProveedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //protected $fillable = ['nombre', 'direccion', 'telefono', 'email'];
        $proveedor = $this->faker->unique()->randomElement([
            // Proveedores Nacionales (Bolivia)
            'Laboratorios Crespal', 'Valencia', 'Pharma Investi', 'Sigma Corp', 
            'Laboratorios Lafar', 'Laboratorios INTI', 'Vita Nova', 'Cofar SA',
            'Droguería INTI', 'Minerva', 'IFA Bolivia',
            
            // Proveedores Latinoamericanos
            'Tecnofarma Internacional', 'Grupo Roemmers', 'Laboratorios Bagó',
            'Eurofarma Latinoamérica', 'Gador SA', 'Laboratorios Chile',
            'Medipharm Perú', 'Hersil Labs', 'Farmaindustria Perú',
            'Laboratorios Saval', 'Grupo Biotoscana', 'Megalabs',
            
            // Proveedores Internacionales
            'Cardinal Health', 'McKesson Corporation', 'AmerisourceBergen',
            'Alliance Healthcare', 'Phoenix Group', 'Profarma', 
            'Shanghai Pharma', 'Sinopharm Group', 'Zuellig Pharma',
            'Medipal Holdings', 'Morris & Dickson', 'HD Smith'
        ]);
        return [
            'nombre' => $proveedor,
            'direccion' => $this->faker->address,
            'telefono' => $this->faker->phoneNumber,
            'email' => $this->faker->email
        ];
    }
}
