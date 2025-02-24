<?php

namespace Database\Factories;

use App\Models\Evento;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


class EventoFactory extends Factory
{
    protected $model = Evento::class;

    
    public function definition()
    {
        return [
            'titolo' => $this->faker->sentence,
            'contenuto' => $this->faker->paragraph,
            'immagine' => $this->faker->imageUrl(640, 480, 'events', true),
            'user_id' => User::factory(), // Create and associate a new user by default
        ];
    }
}

