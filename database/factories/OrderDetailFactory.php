<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderDetailFactory extends Factory
{
    protected $model = OrderDetail::class; // Ensure this is pointing to the correct model

    public function definition()
    {
        return [
            'orderNumber' => Order::inRandomOrder()->first()->orderNumber,
            'productCode' => Product::inRandomOrder()->first()->productCode,
            'quantityOrdered' => $this->faker->numberBetween(1, 100),
            'priceEach' => $this->faker->randomFloat(2, 1, 1000),
            'orderLineNumber' => $this->faker->unique()->numberBetween(1, 100),
        ];
    }
}
