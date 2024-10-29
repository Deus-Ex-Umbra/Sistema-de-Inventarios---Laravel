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
        //protected $table = 'auditorias';
        //protected $fillable = ['id_inventario', 'fecha_auditoria', 'cantidad_registrada', 'cantidad_real', 'valor_registrado', 'valor_real', 'observaciones'];
        Schema::create('auditorias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_inventario')->constrained('inventarios')->onDelete('cascade')->onUpdate('cascade');
            $table->date('fecha_auditoria');
            $table->integer('cantidad_registrada');
            $table->integer('cantidad_real');
            $table->decimal('valor_registrado', 10, 2);
            $table->decimal('valor_real', 10, 2);
            $table->string('observaciones')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auditorias');
    }
};
