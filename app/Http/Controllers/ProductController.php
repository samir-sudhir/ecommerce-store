<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\ProductService;

class ProductController extends Controller
{
    protected $productService;
    // Inject the ProductService through the constructor
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    //getting all products
    public function getAllProductsWithProductLine()
{
    $products = Product::with('productLine')->get();
    return response()->json($products);
}

public function getAllProductsInStock()
{
    $products = Product::where('quantityInStock', '>', 0)->get();
    return response()->json($products);
}
public function getProductsByProductLine($productLine)
{
    $products = Product::where('productLine', $productLine)->get();
    return response()->json($products);
}

    

    // Controller method to handle product search with filters
    public function searchProducts(Request $request)
    {
        // Get filtered products from the ProductService
        $products = $this->productService->searchProducts($request->all());

        // Return the result as JSON
        return response()->json($products);
    }

}
