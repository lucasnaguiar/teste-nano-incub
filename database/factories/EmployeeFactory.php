<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $fistName = $this->faker->firstName();
        $lastName = $this->faker->lastName();

        return [
            'full_name' => $fistName . ' ' . $lastName,
            'username' => $this->faker->userName(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'balance' => $this->faker->numberBetween($min = 100, $max = 1200),
            'admin_id' => 1,
        ];
    }
}
