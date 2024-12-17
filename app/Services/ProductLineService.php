<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Productline;

class ProductlineService
{
    // Get all product lines
    public function getAllProductlines()
    {
        return Productline::all();
    }

    // Get products by product line
    public function getProductsByLine($productLine)
    {
        return Product::where('productLine', $productLine)->get();
    }

    // Get all products in stock
    public function getProductsInStock()
    {
        return Product::where('quantityInStock', '>', 0)->get();
    }
}
