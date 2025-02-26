<?php

namespace Database\Seeders;

use App\Models\Evento;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //$this->createUsers();
        $this->createConvenzioni();
    }

    private function createUsers() {
        User::factory()->create([
            'name' => 'as',
            'email' => 'as@as',
            'password' => 'as',
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Alessandro Bianchini',
            'email' => 'alessandro.bianchini@unibs.it',
            'password' => 'bianchini'
        ]);
    }

    private function createConvenzioni() {
        DB::table('convenzioni')->insert([
            'titolo' => 'Prima Convenzione',
            'descrizione' => 'Prima descrizione di convenzione',
            'pdf_path' => 'pdf/Offerta commerciale-BMW-Youngtimer-Club-loghi.pdf',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}