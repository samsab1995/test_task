<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $users_count = User::count();
        return [
            'user_id' => $this->faker->numberBetween(1, $users_count),
            'name' => $this->faker->company(),
            'price' => $this->faker->numberBetween(1, 1000),
            'uuid' => $this->faker->uuid()
        ];
    }
}
