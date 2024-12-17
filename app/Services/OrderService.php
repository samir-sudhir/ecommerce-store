<?php

namespace App\Services;

use App\Models\Order;

class OrderService
{
    // Get orders by customer number with pagination (1 order per page)
    public function getOrdersByCustomer($customerNumber)
    {
        return Order::where('customer_number', $customerNumber)
                    ->paginate(1); // 1 order per page
    }

    // Get order details by order number
    public function getOrderDetailsByOrder($orderNumber)
    {
        // Assuming there's no need for pagination here
        return Order::find($orderNumber);
    }

    // Get all pending orders with pagination (1 order per page)
    public function getPendingOrders()
    {
        return Order::where('status', 'pending')
                    ->paginate(1); // 1 order per page
    }
}
