<?php

namespace Database\Seeders
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerfilSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('perfils')->insert([
            [
                'perfil_descripcion' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'perfil_descripcion' => 'cliente',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
