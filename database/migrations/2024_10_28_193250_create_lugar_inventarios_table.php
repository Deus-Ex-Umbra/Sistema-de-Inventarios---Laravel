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
        //protected $table = 'lugares_inventarios';
        //protected $fillable = ['nombre', 'id_inventario'];
        Schema::create('lugares_inventarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->foreignId('id_inventario')->constrained('inventarios')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lugares_inventarios');
    }
};
