<?php

namespace App\Pipelines;

use Closure;
use App\Models\Product;

class ProductPipeline
{
    /**
     * Handle the pipeline task.
     *
     * @param $query
     * @param Closure $next
     * @param array $filters
     * @return mixed
     */
    public function handle($query, Closure $next, array $filters)
    {
        // Apply filters to the query
        $query = $this->applyFilters($query, $filters);

        // Pass the query to the next step in the pipeline
        return $next($query);
    }

    /**
     * Apply filters to the query.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param array $filters
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function applyFilters($query, array $filters)
    {
        // Filter by name
        if (!empty($filters['name'])) {
            $query->where('productName', 'LIKE', '%' . $filters['name'] . '%');
        }

        // Filter by time (assuming created_at is a date column)
        if (!empty($filters['time'])) {
            $query->whereDate('created_at', $filters['time']);
        }

        return $query;
    }
}
