<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $adminPerfil = DB::table('perfils')
            ->where('perfil_descripcion', 'admin')
            ->first();

        if (!$adminPerfil) {
            throw new \Exception("No existe el perfil admin");
        }

        DB::table('personas')->insert([
            [
                'nombre'    => 'Admin',
                'apellido'  => 'Sistema',
                'telefono'  => null,
                'email'     => 'admin@admin.com',
                'password'  => Hash::make('raices123456'),
                'id_perfil' => $adminPerfil->id,
                'estado'    => 1,
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
        ]);
    }
}

