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
        //protected $table = 'inventarios';
        //protected $fillable = ['nombre', 'descripcion', 'cantidad_total', 'valor_total', 'estado', 'ruta_imagen'];
        Schema::create('inventarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion')->default('Sin descripción');
            $table->integer('cantidad_total')->default(0);
            $table->decimal('valor_total', 10, 2)->default(0);
            $table->string('estado')->default('activo');
            $table->string('ruta_imagen')->default('inventario.jpg');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventarios');
    }
};
