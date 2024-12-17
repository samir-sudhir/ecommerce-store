<?php

namespace App\Services;

use App\Models\Payment;

class PaymentService
{
    // Get total paid by a customer
    public function getTotalPaidByCustomer($customerNumber)
    {
        return Payment::where('customerNumber', $customerNumber)->sum('amount');
    }

    // Get payments within a date range
    public function getPaymentsInDateRange($startDate, $endDate)
    {
        return Payment::whereBetween('paymentDate', [$startDate, $endDate])->get();
    }
}
