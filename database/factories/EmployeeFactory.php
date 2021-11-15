<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'payroll_number' => $this->faker->unique()->randomNumber(6,true),
            'email' => $this->faker->unique()->safeEmail()
        ];
    }
}