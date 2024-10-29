<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //protected $table = 'productos';
        //protected $fillable = ['nombre', 'descripcion', 'cantidad_total', 'valor_total', 'ruta_imagen', 'categoria_id', 'marca_id', 'proveedor_id', 'inventario_id'];
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion')->default('Sin descripción');
            $table->integer('cantidad_total')->default(0);
            $table->decimal('valor_total', 10, 2)->default(0);
            $table->string('ruta_imagen')->default('medicamento.jpg');
            $table->foreignId('categoria_id')->constrained('categorias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('marca_id')->constrained('marcas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('proveedor_id')->constrained('proveedores')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('inventario_id')->constrained('inventarios')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
