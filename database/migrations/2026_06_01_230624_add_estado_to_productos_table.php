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
        Schema::table('productos', function (Blueprint $table) {
            // Agregamos el campo estado como booleano (verdadero/falso) y que empiece en true (visible)
            $table->boolean('estado')->default(true)->after('id_categoria');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('productos', function (Blueprint $table) {
            // Si alguna vez tirás un rollback, esto borra la columna de forma limpia
            $table->dropColumn('estado');
        });
    }
};