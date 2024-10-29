<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Marca>
 */
class MarcaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //protected $fillable = ['nombre'];
        $marca = $this->faker->unique()->randomElement([
            // Laboratorios Internacionales
            'Bayer', 'Pfizer', 'Sanofi', 'GlaxoSmithKline', 'Merck Sharp & Dohme',
            'Roche', 'Novartis', 'AstraZeneca', 'Eli Lilly', 'AbbVie', 'Amgen',
            'Biogen', 'Gilead Sciences', 'Johnson & Johnson', 'Takeda',
            'Bristol Myers Squibb', 'Boehringer Ingelheim', 'Teva',
            // Laboratorios Bolivianos
            'Sigma', 'Lafar', 'Inti', 'Vita', 'Cofar', 'Bago Bolivia',
            'Droguería INTI', 'Laboratorios Bolivia', 'Minerva', 'IFA',
            'Laboratorios Crespal', 'Valencia', 'Pharma Investi',
            // Otros Laboratorios Latinoamericanos
            'Tecnofarma', 'Roemmers', 'Bagó', 'Eurofarma', 'Gador',
            'Laboratorios Chile', 'Medipharm', 'Hersil', 'Farmaindustria'
        ]);
        return [
            'nombre' => $marca
        ];
    }
}
