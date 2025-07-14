<?php

namespace Database\Factories;

use App\Models\Masters;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Masters>
 */
class MastersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

         protected $model = Masters::class;

    public function definition(): array
    {
       return [
            'name' => $this->faker->name,
        ];
    }
}
