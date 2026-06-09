<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ventas', function (Blueprint $table) {
            $table->enum('estadoVenta', ['realizada'])
                  ->default('realizada')
                  ->change();
        });
    }

    public function down(): void
    {
        Schema::table('ventas', function (Blueprint $table) {
            $table->enum('estadoVenta', ['activa', 'realizada'])
                  ->default('activa')
                  ->change();
        });
    }
};