<?php

namespace Database\Factories;  

use App\Models\Employee;
use App\Models\Customer;  
use Illuminate\Database\Eloquent\Factories\Factory;  

class CustomerFactory extends Factory  
{  
    protected $model = Customer::class;  

    public function definition()  
    {  
        return [  
            'customerNumber' => $this->faker->unique()->randomNumber(5, true),  
            'customerName' => $this->faker->company,  
            'contactLastName' => $this->faker->lastName,  
            'contactFirstName' => $this->faker->firstName,  
            'phone' => $this->faker->phoneNumber,  
            'addressLine1' => $this->faker->streetAddress,  
            'addressLine2' => $this->faker->optional()->streetAddress,  
            'city' => $this->faker->city,  
            'state' => $this->faker->state,  
            'postalCode' => $this->faker->postcode,  
            'country' => $this->faker->country,  
            'salesRepresentative' => Employee::inRandomOrder()->first()->employeeNumber,
            'creditLimit' => $this->faker->optional()->randomFloat(2, 1000, 10000),  
        ];  
    }  
}