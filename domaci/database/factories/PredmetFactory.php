<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Predmet>
 */
class PredmetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'naziv'=>$this->faker->name(),
            'opis'=>$this->faker->sentence(),
            'sef_katedre' => $this->faker->name(),
            'ESPB'=>$this->faker->numberBetween(4,6),
        ];
    }
}
