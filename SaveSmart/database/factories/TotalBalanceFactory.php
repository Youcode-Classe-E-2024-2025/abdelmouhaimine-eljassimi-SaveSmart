<?php

namespace Database\Factories;

use App\Models\TotalBalance;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TotalBalanceFactory extends Factory
{
    protected $model = TotalBalance::class;

    public function definition()
    {
        return [
            'user_id' => User::factory()->create()->id,  // Assuming you need a user_id
            'balance' => $this->faker->randomFloat(2, 0, 10000),  // Example: Random balance amount
        ];
    }
}
