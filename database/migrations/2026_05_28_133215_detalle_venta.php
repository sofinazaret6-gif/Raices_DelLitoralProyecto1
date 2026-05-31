<?php

use Illuminate\Database\Migrations\Migration
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detalle_ventas', function (Blueprint $table){
            $table->id();
            $table->foreignId('id_producto')->constrained('productos');
            $table->integer('detalle_cant')->default(0);
            $table->decimal('detalle_precio', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
   public function down(): void
    {
        Schema::dropIfExists('detalle_ventas');
    }
};
