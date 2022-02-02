<?php

namespace Database\Factories;

use App\Models\Marathon;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'event_name' => $this->faker->realTextBetween(5,20),
            'event_type' => $this->faker->randomElement([0,1,2,3]),
            'marathon_id' => $this->faker->randomElement(Marathon::query()->pluck('id')),
            'time_start_event' => $this->faker->dateTimeBetween()->format('H:i:s'),
            'max_participants' => $this->faker->numberBetween(100, 1000),
            'cost' => $this->faker->numberBetween(300, 1000),
        ];
    }
}
