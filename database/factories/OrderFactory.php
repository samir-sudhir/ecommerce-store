<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition()
    {
        return [
            'orderNumber' => $this->faker->unique()->randomNumber(5, true),
            'orderDate' => $this->faker->date(),
            'requiredDate' => $this->faker->date(),
            'shippedDate' => $this->faker->optional()->date(),
            'status' => $this->faker->randomElement(['Shipped', 'Pending', 'Cancelled']),
            'comments' => $this->faker->optional()->sentence(),
            'customerNumber' => Customer::inRandomOrder()->first()->customerNumber, 
        ];
    }
}
