<?php

namespace App\Services;

use App\Models\Customer;

class CustomerService
{
    // Get all customers with their sales representative (employee)
    public function getAllCustomersWithSalesRep()
    {
        return Customer::with('employee')->get();
    }

    // Get the customer with the highest credit limit
    public function getHighestCreditLimit()
    {
        return Customer::max('creditLimit');
    }

    // Get all customers with a count of their orders
    public function countOrdersByCustomer()
    {
        return Customer::withCount('orders')->get();
    }

    // Get customers along with their order count
    public function getCustomersWithOrderCount()
    {
        return Customer::withCount('orders')->get();
    }

    // Get total payments made by each customer
    public function getTotalPaidByCustomers()
    {
        return Customer::withSum('payments', 'amount')->get();
    }
    
}
