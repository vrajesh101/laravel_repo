<?php

namespace Database\Factories;

use App\Models\Pivote;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PivoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
        protected $model = Pivote::class;

    public function definition(): array
    {
        return [
            //
            "master_id"=>$this->faker->numberBetween(1,8),
            "manytomanies_id"=>$this->faker->numberBetween(1,8)
        ];
    }
}
