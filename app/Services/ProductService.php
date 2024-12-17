<?php

namespace App\Services;

use App\Models\Product;
use App\Pipelines\ProductPipeline;
use Illuminate\Pipeline\Pipeline;

class ProductService
{
    /**
     * Search products with applied filters.
     *
     * @param array $filters
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function searchProducts( $filters)
    {
        // Use the pipeline to apply filters
        $products = app(Pipeline::class)
            ->send(Product::query())
            ->through([
                ProductPipeline::class,
            ])
            ->thenReturn()
            ->with('productLine')
            ->get();

        return $products;
    }
}
