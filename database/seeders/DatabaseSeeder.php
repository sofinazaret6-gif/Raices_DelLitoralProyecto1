<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
<<<<<<< HEAD
        User::firstOrCreate([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
=======
       $this->call([
        PerfilSeeder::class,
        AdminUserSeeder::class,
    ]);
>>>>>>> 0d211c306269d9c7a391ce5d31bc3ad3d297d6e1
    }
}

