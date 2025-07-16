<?php

namespace Database\Factories;

use App\Models\Manytomany;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ManytomanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
         protected $model = Manytomany::class;

    public function definition(): array
    {
        return [
            //
              "name"=>$this->faker->name(),
              "master_id"=>$this->faker->numberBetween(1,8)

        ];
    }
}
