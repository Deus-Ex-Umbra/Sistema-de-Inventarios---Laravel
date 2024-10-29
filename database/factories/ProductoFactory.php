<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Proveedor;
use App\Models\Inventario;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //protected $fillable = ['nombre', 'descripcion', 'cantidad_total', 'valor_total', 'ruta_imagen', 'categoria_id', 'marca_id', 'proveedor_id', 'inventario_id'];
        $nombre = $this->faker->randomElement([
            // Anticoagulantes
            'Warfarina', 'Heparina', 'Rivaroxabán', 'Apixabán', 'Dabigatrán',
            
            // Antiácidos
            'Omeprazol', 'Ranitidina', 'Esomeprazol', 'Lansoprazol', 'Pantoprazol',
            
            // Antieméticos
            'Ondansetrón', 'Metoclopramida', 'Domperidona', 'Dimenhidrinato', 'Granisetron',
            
            // Antivirales
            'Aciclovir', 'Oseltamivir', 'Valaciclovir', 'Famciclovir', 'Ribavirina',
            
            // Suplementos Nutricionales
            'Ensure', 'Glucerna', 'Pediasure', 'Sustagen', 'Proteinex',
            
            // Productos Naturales
            'Valeriana', 'Ginkgo Biloba', 'Propóleo', 'Manzanilla', 'Eucalipto',
            
            // Equipo Médico
            'Termómetro Digital', 'Tensiómetro', 'Glucómetro', 'Nebulizador', 'Oxímetro',
            
            // Ortopedia
            'Rodillera', 'Tobillera', 'Muñequera', 'Cabestrillo', 'Faja Lumbar',
            
            // Cuidado de la Piel
            'Protector Solar', 'Crema Hidratante', 'Jabón Neutro', 'Gel Antibacterial', 'Loción Corporal',
            
            // Control de Peso
            'Garcinia Cambogia', 'L-Carnitina', 'Té Verde', 'Fibra Natural', 'Colágeno',
            
            // Primeros Auxilios
            'Kit de Primeros Auxilios', 'Alcohol 70%', 'Agua Oxigenada', 'Yodo', 'Suero Fisiológico',
            
            // Productos para Diabéticos
            'Tiras Reactivas', 'Lancetas', 'Jeringas Insulina', 'Crema para Pies Diabéticos', 'Suplementos para Diabéticos',
            
            // Productos de Planificación Familiar
            'Preservativos', 'Test de Embarazo', 'Lubricantes', 'Óvulos Vaginales', 'Espermicidas',
            
            // Productos de Rehabilitación
            'Pelotas de Ejercicio', 'Bandas Elásticas', 'Compresas Frío/Calor', 'Masajeadores', 'Electrodos TENS'
        ]);
        $ruta_imagen = $nombre . '.jpg';
        $id_categoria = Categoria::all()->random()->id;
        $id_marca = Marca::all()->random()->id;
        $id_proveedor = Proveedor::all()->random()->id;
        $id_inventario = Inventario::all()->random()->id;
        $ruta_imagen = str_replace('/', '', str_replace(' ', '_', strtolower($nombre))) . '.jpg';

        return [
            'nombre' => $nombre,
            'descripcion' => $this->faker->text(100),
            'cantidad_total' => 0,
            'valor_total' => 0,
            //'ruta_imagen' => $ruta_imagen,
            'ruta_imagen' => 'medicamento.jpg',
            'categoria_id' => $id_categoria,
            'marca_id' => $id_marca,
            'proveedor_id' => $id_proveedor,
            'inventario_id' => $id_inventario
        ];
    }
}
