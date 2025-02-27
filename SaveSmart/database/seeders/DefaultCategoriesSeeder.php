<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class DefaultCategoriesSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            // Income Categories
            ['name' => 'Salaire', 'type' => 'income', 'color' => '#4CAF50', 'is_default' => true],
            ['name' => 'Freelance', 'type' => 'income', 'color' => '#8BC34A', 'is_default' => true],

            // Expense Categories
            ['name' => 'Alimentation', 'type' => 'expense', 'color' => '#F44336', 'is_default' => true],
            ['name' => 'Transport', 'type' => 'expense', 'color' => '#FF9800', 'is_default' => true],
            ['name' => 'Divertissement', 'type' => 'expense', 'color' => '#9C27B0', 'is_default' => true],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'type' => $category['type'],
                'color' => $category['color'],
                'is_default' => $category['is_default'],
                'family_id' => 1,
            ]);
        }
    }
}
