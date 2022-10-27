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
            'avatar' => 'gMYxBMVwjMmOObbRuS95IG3K5NauYIorI7c0qkHT.jpg',
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
            'category_id' => '9795804c-f489-43b1-ad12-9f38adc72cdc',
            'owner_id' => 1,
        ];
    }
}
