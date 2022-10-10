<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'image' => 'https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/chi_ti_t_s_n_ph_m_-_ng__i_nh_n_2/u22.jpg?pageId=8f514a22-c1be-4f2a-b41a-27e1948fc3b1',
            'status' => 1,
            'parent_id' => 1
        ];
    }
}
