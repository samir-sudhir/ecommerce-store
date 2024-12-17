<?php

namespace Database\Factories;  

use App\Models\ProductLine;  
use Illuminate\Database\Eloquent\Factories\Factory;  

class ProductLineFactory extends Factory  
{  
    protected $model = ProductLine::class;  

    public function definition()  
    {  
        return [  
            'productLine' => 'Product Line ' . uniqid(), // Using a unique identifier  
            'textDescription' => $this->faker->sentence,  
            'htmlDescription' => $this->faker->paragraph,  
            'image' => 'https://via.placeholder.com/640x480.png/00aa22?text=ProductLine',  
        ];  
    }  
}