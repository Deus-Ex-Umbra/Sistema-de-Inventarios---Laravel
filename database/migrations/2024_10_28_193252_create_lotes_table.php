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
        //protected $table = 'lotes';
        //protected $fillable = ['numero', 'descripcion', 'cantidad_total', 'valor_total', 'precio_unitario', 'fecha_ingreso', 'fecha_vencimiento', 'producto_id'];
        Schema::create('lotes', function (Blueprint $table) {
            $table->id();
            $table->integer('numero');
            $table->string('descripcion')->default('Sin descripción');
            $table->integer('cantidad_total')->default(0);
            $table->decimal('valor_total', 10, 2)->default(0);
            $table->decimal('precio_unitario', 10, 2)->default(0);
            $table->date('fecha_ingreso');
            $table->date('fecha_vencimiento');
            $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lotes');
    }
};
