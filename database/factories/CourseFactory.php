<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>fake()->sentence(),
            'description'=>fake()->paragraph(3),
            'nb_heure'=>"2",
            'price'=>fake()->randomFloat(2,0,5),
            'image'=>"/assets/images/".fake()->numberBetween(1,10).".jpg",
            'rate'=>fake()->randomFloat(2,0,5),
            "user_id"=>fake()->numberBetween(1,10)
        ];
    }
}
