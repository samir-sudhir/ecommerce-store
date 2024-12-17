<?php

namespace Database\Factories;  

use App\Models\Product;  
use App\Models\ProductLine;  
use Illuminate\Database\Eloquent\Factories\Factory;  

class ProductFactory extends Factory  
{  
    protected $model = Product::class;  

    public function definition()  
    {  
        return [  
            'productCode' => $this->faker->unique()->word,  
            'productName' => $this->faker->word,  
            'productLine' => ProductLine::inRandomOrder()->first()->productLine,  
            'productScale' => $this->faker->word,  
            'productVendor' => $this->faker->word,  
            'productDescription' => $this->faker->text,  
            'quantityInStock' => $this->faker->numberBetween(0, 100),  
            'buyPrice' => $this->faker->randomFloat(2, 1, 100),  
            'MSRP' => $this->faker->randomFloat(2, 1, 100),  
        ];  
    }  
}