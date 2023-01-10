<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'ime'=>$this->faker->firstName(),
            'prezime'=>$this->faker->lastName(),
            'broj_indeksa'=>$this->faker->regexify('[a-z]{2}.20[1-9]{2}\/[1-9]{4}'),
        ];
    }
}
