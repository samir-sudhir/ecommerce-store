<?php

namespace App\Http\Controllers;

use App\Services\PaymentService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    // Get total paid by a customer
    public function getTotalPaidByCustomer($customerNumber)
    {
        try {
            $totalPaid = $this->paymentService->getTotalPaidByCustomer($customerNumber);
            return response()->json($totalPaid);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred'], 500);
        }
    }

    // Get payments in a date range
    public function getPaymentsInDateRange(Request $request)
    {
        try {
            $startDate = $request->query('start');
            $endDate = $request->query('end');
            $payments = $this->paymentService->getPaymentsInDateRange($startDate, $endDate);
            return response()->json($payments);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred'], 500);
        }
    }
}
