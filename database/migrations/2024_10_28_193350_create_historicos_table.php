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
        //protected $table = 'historicos';
        //protected $fillable = ['id_producto', 'entrada_fisica', 'salida_fisica', 'saldo_fisico', 'entrada_valorada', 'salida_valorada', 'saldo_valorado', 'fecha_movimiento', 'id_detalle'];
        Schema::create('historicos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_producto')->constrained('productos')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('entrada_fisica');
            $table->integer('salida_fisica');
            $table->integer('saldo_fisico');
            $table->decimal('entrada_valorada', 10, 2);
            $table->decimal('salida_valorada', 10, 2);
            $table->decimal('saldo_valorado', 10, 2);
            $table->date('fecha_movimiento');
            $table->foreignId('id_detalle')->constrained('detalles')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historicos');
    }
};
