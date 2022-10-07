<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name,
            'desc' => fake()->name,
            'avatar' => Str::random(10),
            'unit' => 'túi',
            'weight' => 1,
            'expiration' => '2022-10-06',
            'quantity' => 1,
            'weight_unit' => 'kg',
            'address' => fake()->address,
            'phone' => '0123456789',
            'stock' => 1,
            'status' => 1,
            'category_id' => 1,
            'owner_id' => 1
        ];
    }
}
