<?php

namespace Database\Factories;

use App\Weetje;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class WeetjeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Weetje::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word(),
            'weetje' => $this->faker->word(),
            'categorie' => '1',
            'user_id' => '1',
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
}
