<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' =>$this->faker->sentence(3),
            'description' => $this->faker->sentence(200),
            'image' => $this->faker->numberBetween(1,4).'.jpg',
            'album_id' => $this->faker->numberBetween(1,5),
        ];
    }
}
