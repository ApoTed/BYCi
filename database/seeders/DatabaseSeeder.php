<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'a@s',
            'password' => 'Iacopo99',
            'role' => 'admin' 

        ]);
    }
    private function createUsers() {

        User::factory()->create([
            'name' => 'Devis Bianchini',
            'email' => 'devis.bianchini@unibs.it',
            'password' => 'bianchini',
            'role' => 'admin'
        ]);

        User::factory()->create([
            'name' => 'Davide Bianchini',
            'email' => 'davide.bianchini@unibs.it',
            'password' => 'bianchini'
        ]);

        User::factory()->create([
            'name' => 'Alessandro Bianchini',
            'email' => 'alessandro.bianchini@unibs.it',
            'password' => 'bianchini'
        ]);
    }
}
