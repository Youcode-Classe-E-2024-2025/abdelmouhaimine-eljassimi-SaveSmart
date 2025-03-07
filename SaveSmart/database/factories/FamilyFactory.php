<?php
namespace Database\Factories;

use App\Models\Family;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class FamilyFactory extends Factory
{
    protected $model = Family::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'password' => bcrypt('password123'),
        ];
    }
}
