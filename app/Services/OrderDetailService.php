<?php

namespace App\Services;

use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;

class OrderDetailService
{
    // Get all Order Details
    public function getAllOrderDetails()
    {
        return OrderDetail::all();
    }

    // Create a new OrderDetail entry
    public function createOrderDetail($data)
    {
        return OrderDetail::create($data);
    }

    // Get OrderDetail by order number
    public function getOrderDetailByOrderNumber($orderNumber)
    {
        return OrderDetail::where('orderNumber', $orderNumber)->first();
    }

    // Update OrderDetail
    public function updateOrderDetail($orderNumber, $data)
    {
        return OrderDetail::where('orderNumber', $orderNumber)->update($data);
    }

    // Delete OrderDetail by order number
    public function deleteOrderDetail($orderNumber)
    {
        return OrderDetail::where('orderNumber', $orderNumber)->delete();
    }
}
