<?php

namespace Database\Factories;

use App\Models\Onetomanies;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OnetomaniesFactory extends Factory
{
    
    use HasFactory;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
        protected $model = Onetomanies::class;

    public function definition(): array
    {
        return [
            //
              "name"=>$this->faker->name(),
              "master_id"=>$this->faker->numberBetween(1,8)

        ];
    }
}
