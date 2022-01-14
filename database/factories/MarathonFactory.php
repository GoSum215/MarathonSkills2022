<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MarathonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'marathon_name' => $this->faker->realTextBetween(5,30),
            'country' => $this->faker->realTextBetween(3,20),
            'city_name' => $this->faker->realTextBetween(3,20),
            'country_id' => 1,
            'year_held' => 0,
            'description' => $this->faker->realTextBetween(30,100),
            'cost' => $this->faker->numberBetween(300, 1000),
            'start_date' => $this->faker->numberBetween(0, 1000000),
        ];
    }
}
