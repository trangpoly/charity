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
            'expire_at' => '2022-10-26',
            'quantity' => 1,
            'weight_unit' => 'kg',
            'address' => fake()->address,
            'phone' => "092345676",
            'stock' => 1,
            'district' => "Cau Giay",
            "city" => "Ha Noi",
            'status' => 1,
            'category_id' => '978b6da6-01b8-463e-a038-ba63a0636565',
            'owner_id' => 1,
        ];
    }
}
