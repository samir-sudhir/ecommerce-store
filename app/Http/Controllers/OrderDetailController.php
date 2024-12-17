<?php

namespace App\Http\Controllers;

use App\Services\OrderDetailService;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    protected $orderDetailService;

    public function __construct(OrderDetailService $orderDetailService)
    {
        $this->orderDetailService = $orderDetailService;
    }

    // Get all order details
    public function index()
    {
        $orderDetails = $this->orderDetailService->getAllOrderDetails();
        return response()->json($orderDetails);
    }

    // Create a new order detail
    public function store(Request $request)
    {
        $data = $request->all();
        $orderDetail = $this->orderDetailService->createOrderDetail($data);
        return response()->json($orderDetail, 201);
    }

    // Get a specific order detail by order number
    public function show($orderNumber)
    {
        $orderDetail = $this->orderDetailService->getOrderDetailByOrderNumber($orderNumber);
        if (!$orderDetail) {
            return response()->json(['message' => 'Order detail not found'], 404);
        }
        return response()->json($orderDetail);
    }

    // Update an existing order detail
    public function update(Request $request, $orderNumber)
    {
        $data = $request->all();
        $updated = $this->orderDetailService->updateOrderDetail($orderNumber, $data);
        if (!$updated) {
            return response()->json(['message' => 'Order detail not found or not updated'], 404);
        }
        return response()->json(['message' => 'Order detail updated successfully']);
    }

    // Delete an order detail
    public function destroy($orderNumber)
    {
        $deleted = $this->orderDetailService->deleteOrderDetail($orderNumber);
        if (!$deleted) {
            return response()->json(['message' => 'Order detail not found'], 404);
        }
        return response()->json(['message' => 'Order detail deleted successfully']);
    }
}
