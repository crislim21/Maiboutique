<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_id' => mt_rand(1,6),
            'user_id' => mt_rand(1,3),
            'title' => $this->faker->sentence(mt_rand(2,4)),
            'slug' => $this->faker->slug(),
            'description' => $this->faker->sentence(mt_rand(3,8)),
            'price' => $this->faker->randomNumber(5, true),
            'stock' => $this->faker->randomNumber(3, false),
        ];
    }
}
