<?php

namespace Database\Seeders;
use App\Models\Evento;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->createUsers();
        // User::factory(10)->create();
        //Evento::factory()->create([
         //   'titolo' => '2  Sample Event 2',
            //'contenuto' => '2 This is a sample event description22222222222222222222.',
          //  'immagine' => 'public/img/pretty-1-th.jpg',  // Replace with actual image path or URL
            //'user_id' => 3,  // Assign the specific user ID
        //]);
        /*User::factory()->create([
            'name' => 'apo',
            'email' => 'apo@apo',
            'password' => 'apo',
            'role' => 'registered_user', 

        ]);*/
       
        
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
}
