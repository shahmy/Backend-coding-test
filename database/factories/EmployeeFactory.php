<?php

namespace Database\Factories;

use App\Models\Employee;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Employee::class;

    public function definition()
    {
        return [
            'full_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'gender' => $this->faker->name(),
            'phone_no' => $this->faker->nphoneNumber(),
            'mobile_no' => $this->faker->phoneNumber(),
            'status' => '1',
        ];
    }
}
