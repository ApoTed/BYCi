<?php

namespace Database\Seeders;

use App\Models\Evento;
use App\Models\Club;
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
        $this->createUsers();
        $this->createConvenzioni();
        $this->createEventi();
        $this->createClub();

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
    private function createEventi() {
        Evento::create([
            'titolo' => 'Primo Evento',
            'contenuto' => 'Descrizione del primo evento',
            'immagine' => 'images/evento1.jpg',
            'user_id' => 1, // Assicurati che l'utente con ID 1 esista
            'data' => '2025-03-10',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Evento::create([
            'titolo' => 'Secondo Evento',
            'contenuto' => 'Descrizione del secondo evento',
            'immagine' => 'images/evento2.jpg',
            'user_id' => 1, // Assicurati che l'utente con ID 1 esista
            'data' => '2025-04-15',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
    public function createClub(){
        Club::create([
            'titolo' => 'BMW Youngtimer Club',
            'descrizione' => 'Il club per gli appassionati di BMW Youngtimer
            aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
            aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
            aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
            aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa',
            'immagine' => 'public/img/01_BMW_Clubs_Logos_BMWCTC_RZ_white.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}