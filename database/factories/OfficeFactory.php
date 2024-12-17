<?php

namespace Database\Factories;  

use App\Models\Office;  
use Illuminate\Database\Eloquent\Factories\Factory;  

class OfficeFactory extends Factory  
{  
    protected $model = Office::class;  

    public function definition()  
{  
    return [  
        'officeCode' => $this->faker->unique()->sentence(3), 
        'city' => $this->faker->city,  
        'phone' => $this->faker->phoneNumber,  
        'addressLine1' => $this->faker->streetAddress,  
        'addressLine2' => $this->faker->optional()->streetAddress,  
        'state' => $this->faker->state,  
        'country' => $this->faker->country,  
        'postalCode' => $this->faker->regexify('[A-Z0-9]{5,10}'),  // Restrict postalCode length
        'territory' => $this->faker->word,  
    ];  
}
  
}