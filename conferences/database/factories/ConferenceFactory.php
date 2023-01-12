<?php

namespace Database\Factories;

use App\Models\Conference;
use App\Models\Country;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConferenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Conference::class;
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(4),
            'date' => $this->faker->date,
            'latitude' => $this->faker->randomFloat(5, -90,90),
            'longitude' => $this->faker->randomFloat(5, -90,90),
            'country_id' => Country::get()->random()->id,
            'user_id' => User::get()->random()->id,
        ];
    }
}
