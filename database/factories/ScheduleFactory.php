<?php

namespace Database\Factories;

use App\Models\Schedule;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Schedule::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'month' => $this->faker->month(),
            'day' => $this->faker->dayOfMonth(),
            'employee_id' => function () {
                return factory(App\Employee::class)->create()->id;
            },
            'shift_id' => function () {
                return factory(App\Shift::class)->create()->id;
            },
            'location_id' => function () {
                return factory(App\Location::class)->create()->id;
            },
        ];
    }
}
