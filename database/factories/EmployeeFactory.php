<?php

namespace Database\Factories;  

use App\Models\Office;
use App\Models\Employee;  
use Illuminate\Database\Eloquent\Factories\Factory;  

class EmployeeFactory extends Factory  
{  
    protected $model = Employee::class;  

    public function definition()  
    {  
        return [  
            'employeeNumber' => $this->faker->unique()->randomNumber(5, true),  
            'lastName' => $this->faker->lastName,  
            'firstName' => $this->faker->firstName,  
            'extension' => $this->faker->bothify('###-??'),  
            'email' => $this->faker->unique()->safeEmail,  
            'officeCode' => Office::inRandomOrder()->first()->officeCode,  
            'reportsTo' => null,
            'jobTitle' => $this->faker->jobTitle,  
        ];  
    }  
}