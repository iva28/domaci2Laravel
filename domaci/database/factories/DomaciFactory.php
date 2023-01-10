<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Predmet;
use App\Models\Student;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Domaci>
 */
class DomaciFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
           'opis'=>$this->faker->sentence($nbWords = 6, $variableNbWords = true),
           'datum'=>$this->faker->date($format = 'Y-m-d', $max = 'now'),
           'predmet_id'=>Predmet::factory(),
           'student_id'=>Student::factory()
        ];
    }
}
