<?php

namespace App\Http\Controllers;

use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    // Get orders by customer number with pagination (1 order per page)
    public function getOrdersByCustomer($customerNumber)
    {
        try {
            $orders = $this->orderService->getOrdersByCustomer($customerNumber);
            return response()->json($orders);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred'], 500);
        }
    }

    // Get order details by order number
    public function getOrderDetailsByOrder($orderNumber)
    {
        try {
            $orderDetails = $this->orderService->getOrderDetailsByOrder($orderNumber);
            return response()->json($orderDetails);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred'], 500);
        }
    }

    // Get all pending orders with pagination (1 order per page)
    public function getPendingOrders()
    {
        try {
            $pendingOrders = $this->orderService->getPendingOrders();
            return response()->json($pendingOrders);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred'], 500);
        }
    }
}
