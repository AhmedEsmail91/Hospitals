<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'filename' => 'https://via.placeholder.com/100x100/0f0f0f',
            'imageable_id' => $this->faker->randomElement(User::pluck('id')->toArray()),
            'imageable_type' => $this->faker->randomElement(['App\Models\Doctor','App\Models\User']), // the image is associated with a doctor model

        ];
    }
}
