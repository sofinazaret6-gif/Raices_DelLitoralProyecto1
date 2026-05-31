<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('consultas', function (Blueprint $table) {

            // eliminar persona_id
            $table->dropForeign(['persona_id']);
            $table->dropColumn('persona_id');

            // agregar datos del usuario
            $table->string('nombre')->after('id');
            $table->string('apellido')->after('nombre');
            $table->string('email')->after('apellido');

        });
    }

    public function down(): void
    {
        Schema::table('consultas', function (Blueprint $table) {

            $table->foreignId('persona_id')
                  ->constrained('personas');

            $table->dropColumn([
                'nombre',
                'apellido',
                'email'
            ]);
        });
    }
};