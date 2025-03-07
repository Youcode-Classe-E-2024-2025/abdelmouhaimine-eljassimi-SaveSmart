<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Family;
use App\Models\SavingGoal;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SavingGoalFactory extends Factory
{
    protected $model = SavingGoal::class;
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'target_amount' => $this->faker->randomFloat(2, 100, 10000),
            'current_amount' => $this->faker->randomFloat(2, 0, 5000),
            'target_date' => $this->faker->dateTimeBetween('now', '+2 years'),
            'is_completed' => false,
            'user_id' => User::factory(),
            'family_id' => Family::factory(),
            'category_id' => Category::factory(),
        ];
    }
}
