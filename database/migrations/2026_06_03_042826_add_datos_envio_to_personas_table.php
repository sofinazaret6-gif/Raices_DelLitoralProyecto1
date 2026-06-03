<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::table('personas', function (Blueprint $table) {

        $table->string('dni')->nullable()->after('telefono');

        $table->string('direccion')->nullable()->after('dni');

        $table->string('ciudad')->nullable()->after('direccion');

        $table->string('provincia')->nullable()->after('ciudad');

        $table->string('codigo_postal')->nullable()->after('provincia');

    });
}

   public function down(): void
{
    Schema::table('personas', function (Blueprint $table) {

        $table->dropColumn([
            'dni',
            'direccion',
            'ciudad',
            'provincia',
            'codigo_postal'
        ]);

    });
}
};
