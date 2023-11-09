<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\product::factory()->create([
            "name_product" => 'Nike Air Max 90',
            "category" => 'runner',
            "image_product" => 'nike-air-max-90.jpg',
            "supplier" => 'Nike Inc',
            "code" => 'AR199',
            "stock" => fake()->numberBetween(1,10),
            "cost" => fake()->numberBetween(70,500),
            "price" => fake()->numberBetween(70,400),
            "description" => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit.
            Repudiandae ratione veritatis nulla voluptatem consequatur et eveniet,
            accusamus cumque',
        ]);
        \App\Models\product::factory()->create([
            "name_product" => 'Nike Shoes',
            "category" => 'runner',
            "image_product" => 'nike-shoes.jpg',
            "supplier" => 'Nike Inc',
            "code" => 'CB100',
            "stock" => fake()->numberBetween(1,10),
            "cost" => fake()->numberBetween(70,500),
            "price" => fake()->numberBetween(70,400),
            "description" => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit.
            Repudiandae ratione veritatis nulla voluptatem consequatur et eveniet,
            accusamus cumque',
        ]);
        \App\Models\product::factory()->create([
            "name_product" => 'Nike Air Force One',
            "category" => 'runner',
            "image_product" => 'nike-force-one.jpg',
            "supplier" => 'Nike Inc',
            "code" => 'DE200',
            "stock" => fake()->numberBetween(1,10),
            "cost" => fake()->numberBetween(70,500),
            "price" => fake()->numberBetween(70,400),
            "description" => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit.
            Repudiandae ratione veritatis nulla voluptatem consequatur et eveniet,
            accusamus cumque',
        ]);

        \App\Models\sale::factory()->create([
            "amount" => fake()->numberBetween(1,10),
            "price" => fake()->numberBetween(50,200),
            "size" => fake()->numberBetween(1,10),
            "status" => 'proceso',
        ]);

        \App\Models\sale::factory()->create([
            "amount" => fake()->numberBetween(1,10),
            "price" => fake()->numberBetween(50,200),
            "size" => fake()->numberBetween(1,10),
            "status" => 'proceso',
        ]);



        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
