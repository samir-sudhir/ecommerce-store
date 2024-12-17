<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    
    public function getAllCustomersWithSalesRep()
    {
        $customers = Customer::with('employee')->get();
        // return response()->json($customers);
        $message="This is your required details";
    return success($message,200,$customers);
}
public function getHighestCreditLimit()
{
    $highestCreditLimit = Customer::max('creditLimit');
    // return response()->json($highestCreditLimit);
    $message="This is your required details";
    return success($message,200,$highestCreditLimit);
}
public function countOrdersByCustomer()
{
    $customers = Customer::withCount('orders')->get();
    // return response()->json($customers);
     $message="This is your required details";
    return success($message,200,$customers);
}
public function getCustomersWithOrderCount()
{
    $customers = Customer::withCount('orders')->get();
    // return response()->json($customers);
     $message="This is your required details";
    return success($message,200,$customers);

}
 public function getTotalPaidByCustomers()
{
    $customers = Customer::withSum('payments', 'amount')->get();
    // return response()->json($customers);
     $message="This is your required details";
    return success($message,200,$customers);
}

}


