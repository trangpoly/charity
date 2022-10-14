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
            'expire_at' => '2022-10-06',
            'quantity' => 1,
            'weight_unit' => 'kg',
            'address' => fake()->address,
            'phone' => "092345676",
            'stock' => 1,
            'district' => "HN",
            "city" => "VN",
            'status' => 1,
            'category_id' => '97776869-558c-4dc4-b994-9667a22b9620',
            'owner_id' => 1,
            'category_id' => 1,
            'owner_id' => 1,
        ];
    }
}
