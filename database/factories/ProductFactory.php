<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
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
    public function definition()
    {
        return [
            'product_code' => Str::random(20),
            'sku' => Str::random(30),
            'product_name' => Str::random(10),
            'description' => $this->faker->realText(100, 5),
            'specs' => $this->faker->realText(1000, 5),
            'category_name' => 'RAM',
            'sub_category_name' => Arr::random(['RAM-1', 'RAM-2', 'RAM-3', 'RAM-4']),
            // 'brand_id' => 1,
            'stock' => $this->faker->randomDigit,
        ];
    }
}
