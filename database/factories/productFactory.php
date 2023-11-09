<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product>
 */
class productFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name_product" => 'Nike Air Max 90',
            "category" => 'runner',
            "image_product" => 'nike-air-max-90.jpg',
            "supplier" => 'Nike Inc',
            "code" => 'undefined',
            "stock" => fake()->numberBetween(1,10),
            "cost" => fake()->numberBetween(70,500),
            "price" => fake()->numberBetween(70,400),
            "description" => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit.
            Repudiandae ratione veritatis nulla voluptatem consequatur et eveniet,
            accusamus cumque',
        ];
    }
}
