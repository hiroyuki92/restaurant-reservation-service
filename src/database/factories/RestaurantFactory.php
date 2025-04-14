<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Restaurant;
use App\Models\Area;
use App\Models\Genre;

class RestaurantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'area_id' => Area::inRandomOrder()->first()->id,
            'genre_id' => Genre::inRandomOrder()->first()->id,
            'description' => $this->faker->paragraph,
            'image_url' => $this->faker->imageUrl(640, 480, 'food', true),
        ];
    }
}
