<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConvenzioniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('convenzioni')->insert([
            'titolo' => 'Prima Convenzione',
            'descrizione' => 'Prima descrizione di convenzione',
            'pdf_path' => 'public/pdf/Offerta commerciale-BMW-Youngtimer-Club-loghi.pdf',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}