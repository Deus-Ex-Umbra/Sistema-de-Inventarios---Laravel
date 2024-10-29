<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Inventario;
use App\Models\LugarInventario;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Proveedor;
use App\Models\Producto;
use App\Models\Lote;
use App\Models\Detalle;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            InventarioSeeder::class,
            LugarInventarioSeeder::class,
            CategoriaSeeder::class,
            MarcaSeeder::class,
            ProveedorSeeder::class,
            ProductoSeeder::class,
            LoteSeeder::class,
            DetalleSeeder::class,
        ]);
    }
}
