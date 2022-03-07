<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'transaction_type_id' => random_int(1, 2),
            'amount' => $this->faker->numberBetween($min = 10, $max = 100),
            'obs' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'admin_id' => 1,
            'employee_id' => Employee::factory(),
            'created_at' => $this->faker->dateTimeInInterval($startDate = '2022-03-1 08:00:00', $interval = '+ 7 days', $timezone = 'America/Sao_Paulo') // DateTime('2003-03-15 02:00:49', 'Antartica/Vostok')

        ];
    }
}
