<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Family;
use App\Models\User; // Import the User model
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'type' => $this->faker->randomElement(['income', 'expense', 'goal']),
            'family_id' => Family::factory()->create()->id,
            'user_id' => User::factory()->create()->id, // Add the user_id
        ];
    }
}
