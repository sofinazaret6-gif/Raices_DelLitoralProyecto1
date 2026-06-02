<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::table('detalle_ventas', function (Blueprint $table) {
        $table->foreignId('id_venta')
              ->constrained('ventas');
    });
}

public function down(): void
{
    Schema::table('detalle_ventas', function (Blueprint $table) {
        $table->dropForeign(['id_venta']);
        $table->dropColumn('id_venta');
    });
}
};
