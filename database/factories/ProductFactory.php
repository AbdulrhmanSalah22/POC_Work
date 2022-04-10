<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $category_id = DB::table('categories')->pluck('id');
        return [
            'name' => $this->faker->word(),
            'category_id' => $this->faker->randomElement($category_id),
        ];
    }
}
