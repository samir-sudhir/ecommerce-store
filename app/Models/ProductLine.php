<?php

namespace App\Models;  

use Illuminate\Database\Eloquent\Factories\HasFactory;  
use Illuminate\Database\Eloquent\Model;  

class ProductLine extends Model  
{  
    use HasFactory;  

    protected $table = 'productlines';  

    protected $fillable = [  
        'productLine',  
        'textDescription',  
        'htmlDescription',  
        'image',  
    ];  

    public function products()  
    {  
        return $this->hasMany(Product::class, 'productLine', 'productLine');  
    }  
}