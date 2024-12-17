<?php

namespace App\Http\Controllers;

use App\Services\ProductlineService;
use Illuminate\Http\Request;

class ProductlineController extends Controller
{
    protected $productlineService;

    public function __construct(ProductlineService $productlineService)
    {
        $this->productlineService = $productlineService;
    }

    // Get all product lines
    public function index()
    {
        try {
            $productlines = $this->productlineService->getAllProductlines();
            return response()->json($productlines);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred'], 500);
        }
    }

    // Get products by a specific product line
    public function getProductsByLine($productLine)
    {
        try {
            $products = $this->productlineService->getProductsByLine($productLine);
            return response()->json($products);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred'], 500);
        }
    }

    // Get all products in stock
    public function getProductsInStock()
    {
        try {
            $products = $this->productlineService->getProductsInStock();
            return response()->json($products);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred'], 500);
        }
    }
}
