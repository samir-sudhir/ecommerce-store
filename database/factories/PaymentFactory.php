<?php

namespace Database\Factories;  

use App\Models\Customer;
use App\Models\Payment;  
use Illuminate\Database\Eloquent\Factories\Factory;  

class PaymentFactory extends Factory  
{  
    protected $model = Payment::class;  

    public function definition()  
    {  
        return [  
            'customerNumber' =>  Customer::inRandomOrder()->first()->customerNumber,  
            'checkNumber' => $this->faker->unique()->word,  
            'paymentDate' => $this->faker->date(),  
            'amount' => $this->faker->randomFloat(2, 1, 1000),  
        ];  
    }  
}